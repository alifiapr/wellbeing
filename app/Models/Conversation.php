<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    use HasFactory;

    protected $fillable = ['sender_id', 'receiver_id', 'active'];

    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    public function getReceiver()
    {
        if ($this->sender_id == auth()->id()) {
            return User::firstWhere('id', $this->receiver_id);
        } else {
            return User::firstWhere('id', $this->sender_id);
        }
    }

    public function unreadMessagesCount()
    {
        return Message::where('conversation_id', $this->id)
            ->where('receiver_id', auth()->id())
            ->whereNull('read_at')
            ->count();
    }

    public function isLastMessageReadByUser(){
        $user = auth()->user();
        $lastMessage = $this->messages()->latest()->first();

        if($lastMessage){
            return $lastMessage->read_at !== null && $lastMessage->sender_id == $user->id;
        }
    }

    public function scopeWhereNotDeleted($query){
        $user_id = auth()->id();

        return $query->where(function($query) use ($user_id){
           //Where message is not deleted
           $query->whereHas('messages', function($query) use ($user_id){
              $query->where(function($query) use ($user_id){
                $query->where('sender_id', $user_id)
                    ->whereNull('sender_deleted_at');
              })->orWhere(function($query) use ($user_id){
                $query->where('receiver_id', $user_id)
                    ->whereNull('receiver_deleted_at');
              });
           })
           ->orWhereDoesntHave('messages');
        });
    }
}
