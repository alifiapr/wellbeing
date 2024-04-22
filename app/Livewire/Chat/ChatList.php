<?php

namespace App\Livewire\Chat;

use App\Models\Conversation;
use Livewire\Component;
use Livewire\Attributes\On;

class ChatList extends Component
{
    public $selected_conversation;
    public $query;

    public function render()
    {
        return view('livewire.chat.chat-list', [
            'conversations' => auth()->user()->conversations()->latest('updated_at')->get(),
        ]);
    }

    #[On('refresh')]
    public function refresh()
    {
        $this->render();
    }

    public function deleteByUser($id){
        $user_id = auth()->id();
        $conv = Conversation::find(decrypt($id));

        #Mark as deleted by user
        $conv->messages()->each(function($message) use ($user_id){
            if($message->sender_id == $user_id){
                $message->update(['sender_deleted_at' => now()]);
            }elseif($message->receiver_id == $user_id){
                $message->update(['receiver_deleted_at' => now()]);
            }
        });

        #Delete conversation if both users deleted
        $receiverAlsoDeleted = $conv->messages()->where(function($query) use ($user_id){
            $query->where('sender_id', $user_id)
                ->orWhere('receiver_id', $user_id);
        })->where(function($query) use($user_id){
            $query->whereNull('sender_deleted_at')
                ->orWhereNull('receiver_deleted_at');
        })->doesntExist();

        if($receiverAlsoDeleted){
            $conv->forceDelete();
        }

        return redirect()->route('chat.index');
    }
}