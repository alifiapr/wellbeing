<?php

namespace App\Livewire\Chat;

use App\Models\Conversation;
use App\Models\Message;
use App\Notifications\KonselingDone;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use App\Notifications\MessageRead;
use App\Notifications\MessageSent;

class ChatBox extends Component
{
    public $selected_conversation;

    #[Validate('required|string')]
    public $body;

    public $loaded_messages;

    public $paginate = 10;

    public function mount()
    {
        $this->loadMessages();
    }

    public function render()
    {
        return view('livewire.chat.chat-box');
    }

    public function getListeners()
    {
        $auth_id = auth()->id();

        return [
            'load_more' => 'loadMore',
            "echo-private:users.{$auth_id},.Illuminate\\Notifications\\Events\\BroadcastNotificationCreated" => 'broadcastedNotifications',
        ];
    }

    #[On('load-more')]
    public function loadMore()
    {
        $this->paginate += 10;
        $this->loadMessages();

        #update height
        $this->dispatch('update-chat-height');
    }

    public function sendMessage()
    {
        $this->validate();
        $created_message = $this->selected_conversation->messages()->create([
            'sender_id' => auth()->id(),
            'body' => $this->body,
            'receiver_id' => $this->selected_conversation->getReceiver()->id,
        ]);

        $this->reset('body');

        #scroll to bittim
        $this->dispatch('scroll-bottom');

        #push new message
        $this->loaded_messages->push($created_message);

        $this->selected_conversation->updated_at = now();
        $this->selected_conversation->save();

        $this->dispatch('refresh');

        $this->selected_conversation->getReceiver()->notify(new MessageSent(
            auth()->user(),
            $created_message,
            $this->selected_conversation,
            $this->selected_conversation->getReceiver()->id
        ));
    }

    public function loadMessages()
    {
        $userId = auth()->id();

        #get count
        $count = Message::where('conversation_id', $this->selected_conversation->id)
            ->where(function ($query) use ($userId) {
                $query->where(function ($query) use ($userId) {

                    $query->where(['sender_id' => $userId])
                        ->whereNull('sender_deleted_at');
                })
                    ->orWhere(function ($query) use ($userId) {

                        $query->where(['receiver_id' => $userId])
                            ->whereNull('receiver_deleted_at');
                    });
            })
            ->count();

        #skip and query
        $this->loaded_messages = Message::where('conversation_id', $this->selected_conversation->id)
            ->where(function ($query) use ($userId) {
                $query->where(function ($query) use ($userId) {

                    $query->where(['sender_id' => $userId])
                        ->whereNull('sender_deleted_at');
                })
                    ->orWhere(function ($query) use ($userId) {

                        $query->where(['receiver_id' => $userId])
                            ->whereNull('receiver_deleted_at');
                    });
            })
            ->skip($count - $this->paginate)
            ->take($this->paginate)
            ->get();

        // dd($this->loaded_messages->toArray(), $this->selected_conversation->toArray());

    }

    public function broadcastedNotifications($event)
    {
        if ($event['type'] == MessageSent::class) {
            if ($event['conversation_id'] == $this->selected_conversation->id) {
                $new_message = Message::find($event['message_id']);
                #push new message
                $this->loaded_messages->push($new_message);
                #scroll to bittim
                $this->dispatch('scroll-bottom');

                #mark as read
                $new_message->update([
                    'read_at' => now()
                ]);

                #broadcast read
                $this->selected_conversation->getReceiver()->notify(new MessageRead(
                    $this->selected_conversation->id
                ));
            }
        }else if($event['type'] == KonselingDone::class){
            if($event['conversation_id'] == $this->selected_conversation->id){

                Conversation::find($event['conversation_id'])->update([
                    'active' => 0
                ]);

                $this->dispatch('hide-chat-input');
            }
        }
    }

}
