<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\Conversation;

class Users extends Component
{
    public function render()
    {
        $users = User::where('id', '!=', auth()->id())->get();
        return view(
            'livewire.users',
            ['users' => $users]
        );
    }
    
    public function message($user_id){
        $authenticated_user_id = auth()->id();

        // check conversation exists

        $existing_conversation = Conversation::where(function($query) use($authenticated_user_id, $user_id)
        {
            $query->where('sender_id', $authenticated_user_id)
                ->where('receiver_id', $user_id);
        })->orWhere(function($query) use($authenticated_user_id, $user_id)
        {
            $query->where('sender_id', $user_id)
                ->where('receiver_id', $authenticated_user_id);
        })->first();

        if($existing_conversation){
            return redirect()->route('chat', ['query' => $existing_conversation->id]);
        }

        //create new conversation
        $created_conversation = Conversation::create([
            'sender_id' => $authenticated_user_id,
            'receiver_id' => $user_id
        ]);

        return redirect()->route('chat', ['query' => $created_conversation->id]);
    }
}
