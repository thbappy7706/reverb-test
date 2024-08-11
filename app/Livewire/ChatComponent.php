<?php

namespace App\Livewire;

use App\Events\MessageSendEvent;
use App\Models\Message;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Attributes\On;
use Livewire\Component;

class ChatComponent extends Component
{

    public $user;
    public $senderId;
    public $receiverId;
    public string $message = '';
    public array $messages = [];

    public function render()
    {
        return view('livewire.chat-component');
    }

    public function mount($userId)
    {
        $this->senderId = auth()->user()->id;
        $this->receiverId = $userId;
        $fetchMessages = Message::where(function ($query) {
            $query->where('sender_id', $this->senderId)->where('receiver_id', $this->receiverId);
        })->orWhere(function ($query) {
            $query->where('sender_id', $this->receiverId)->where('receiver_id', $this->senderId);
        })->with('sender:id,name', 'receiver:id,name')->get();

        foreach ($fetchMessages as $message) {
            $this->appendChatMessage($message);
        }
        $this->user = User::whereId($userId)->first();
    }

    public function sendMessage()
    {
        $data = Message::create([
            'sender_id' => $this->senderId,
            'receiver_id' => $this->receiverId,
            'message' => $this->message,
        ]);
        $this->appendChatMessage($data);
        broadcast(new MessageSendEvent($data))->toOthers();
        $this->message = '';
    }


    #[On('echo-private:chat-channel.{senderId},MessageSendEvent')]
    public function listenForMessage($event)
    {
        $messageData = $event['message'];
        $chatMessage = Message::whereId($messageData['id'])->with('sender:id,name', 'receiver:id,name')->first();
        $this->appendChatMessage($chatMessage);
    }

    public function appendChatMessage($data)
    {
        $this->messages [] = [
            'id' => $data->id,
            'message' => $data->message,
            'sender' => $data->sender->name,
            'receiver' => $data->receiver->name,
        ];
    }
}
