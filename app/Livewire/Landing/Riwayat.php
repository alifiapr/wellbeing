<?php

namespace App\Livewire\Landing;

use App\Livewire\Users;
use Livewire\Component;
use App\Models\Conversation;
use App\Notifications\KonselingDone;
use Barryvdh\DomPDF\Facade\Pdf;

class Riwayat extends Component
{
    public $konseling = [];
    public $category = 1;
    public $note = '';

    public function render()
    {
        return view('livewire.landing.riwayat');
    }

    public function mount()
    {
        $this->getKonselingOnline();
    }

    public function goToMessage($user_id)
    {
        $authenticated_user_id = auth()->id();

        // check conversation exists

        $existing_conversation = Conversation::where(function ($query) use ($authenticated_user_id, $user_id) {
            $query->where('sender_id', $authenticated_user_id)
                ->where('receiver_id', $user_id);
        })->orWhere(function ($query) use ($authenticated_user_id, $user_id) {
            $query->where('sender_id', $user_id)
                ->where('receiver_id', $authenticated_user_id);
        })->first();

        if ($existing_conversation) {
            return redirect()->route('chat', ['query' => $existing_conversation->id]);
        }

        //create new conversation
        $created_conversation = Conversation::create([
            'sender_id' => $authenticated_user_id,
            'receiver_id' => $user_id
        ]);

        return redirect()->route('chat', ['query' => $created_conversation->id]);
    }

    public function getKonselingOnline()
    {
        $this->category = 1;
        $this->getKonseling();    
    }

    public function getKonselingOffline()
    {
        $this->category = 2;
        $this->getKonseling();   
    }

    public function getKonseling()
    {
        //check if user is authenticated
        if (auth()->check()) {
            $this->konseling = [];

            if(auth()->user()->hasRole('psikolog')){
                $this->konseling = auth()->user()->konselingAsPsikolog()
                ->with('client')->where('category', $this->category)->get();
            }
            else{
                $this->konseling = auth()->user()->konselingAsClient()
                ->with('psikolog.dataPsikolog')->where('category', $this->category)->get();
            }
        }
    }

    public function selesaiKonseling($id){
        //get konseling as psikolog
        $konseling = auth()->user()->konselingAsPsikolog()->find($id);
        
        //update status konseling
        $konseling->update([
            'berlangsung' => 2,
            'note' => $this->note
        ]);

        //refresh konseling
        $this->getKonseling();

        //reset note
        $this->note = '';

        //get conversation that has sender_id and receiver_id equals to psikolog and client
        //or vice versa
        $conversation = Conversation::where(function($query) use($konseling){
            $query->where('sender_id', $konseling->psikolog_id)
                ->where('receiver_id', $konseling->client_id);
        })->orWhere(function($query) use($konseling){
            $query->where('sender_id', $konseling->client_id)
                ->where('receiver_id', $konseling->psikolog_id);
        })->first();
        

        //notify client that konseling is done
        $konseling->client->notify(new KonselingDone(
            $conversation->id
        ));
    }
}
