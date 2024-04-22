<?php

namespace App\Livewire\Chat;

use App\Models\Message;
use Livewire\Component;
use App\Models\Conversation;

class Chat extends Component
{
    public $query;
    public $selected_conversation;

    public function mount()
    {
        $this->selected_conversation = Conversation::findOrFail($this->query);
        
        #Mark message belonging to receiver as read
        Message::where('conversation_id', $this->selected_conversation->id)
        ->where('receiver_id', auth()->id())
        ->whereNull('read_at')
        ->update(['read_at' => now()]);
    }

    public function render()
    {
        return view('livewire.chat.chat')->layout('layouts.guest');
    }
    
}
