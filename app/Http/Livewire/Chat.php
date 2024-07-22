<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use App\Models\Chat as ChatModel;
use Livewire\WithFileUploads;
class Chat extends Component
{
    use WithFileUploads;
    public $conversations;
    public $chat = [];


    public $messageText = '';

    public $userId = 0;

    public $is_admin = false;

    public $rxfile = null;



    public function mount()
    {
        $this->conversations = ChatModel::latest()->get()->unique('sender_id');
        if(!$this->is_admin)
        {
            self::loadChat(auth()->id());
        }
    }
    
    public function sendMessage()
    {
        
        $hasFile= false;
        $temporaryFilePath ='xxxxx';
        if (!is_null($this->rxfile)) {

            $customFileName = now()->format('dmyhis').'_rx.png';
            $destinationPath =  Storage::putFileAs(
                'rx_files',
                $this->rxfile,
                $customFileName
            );
            $temporaryFilePath = $destinationPath;
            $hasFile = true;
            
        }

        $chat = new ChatModel();
        $chat->sender_id = auth()->user()->id;
        $chat->reciever_id = $this->is_admin? $this->userId : 1;
        $chat->message = $this->messageText;
        $chat->file = $hasFile? $temporaryFilePath : '' ;
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
