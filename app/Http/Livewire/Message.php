<?php

namespace App\Http\Livewire;

use App\Models\Chat;
use Livewire\Component;

class Message extends Component
{
    public Chat $message;

    public function render()
    {
        return view('livewire.message');
    }
}
