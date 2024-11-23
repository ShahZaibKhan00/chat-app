<?php

namespace App\Livewire\Chat;
use Livewire\Attributes\Layout;

use Livewire\Component;

class CreateChat extends Component
{

    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.chat.create-chat');
    }
}
