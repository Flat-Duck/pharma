<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Chat as ChatModel;
class Chat extends Component
{
    public $conversations;
    public $chat = [];


    public $messageText = '';

    public $userId = 0;



    public function mount()
    {
        $this->conversations = ChatModel::latest()->get()->unique('sender_id');
    }
    
    public function sendMessage()
    {
        $chat = new ChatModel();
        $chat->sender_id = auth()->user()->id;
        $chat->reciever_id = $this->userId;
        $chat->message = $this->messageText;
        $chat->save();
        $this->messageText = '';
        $this->loadChat($this->userId);
    }
    
    public function loadChat($id)
    {
        $this->chat = [];
        $this->userId = $id;
        $allchats =  ChatModel::where('reciever_id', $id)->orWhere('sender_id', $id )->orderBy('id')->get();

        $this->chat =  $allchats->map(function (ChatModel $chat) {
            $chat->ismine = false;
            
            if ($chat->sender_id == auth()->user()->id) {
                $chat->ismine = true;
            }
            return $chat;
        });
    }
    public function render()
    {
        return view('livewire.chat');
    }
}
