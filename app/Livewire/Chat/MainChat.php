<?php

namespace App\Livewire\Chat;

use Livewire\Component;
use Livewire\Attributes\Layout;

class MainChat extends Component
{
    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.chat.main-chat');
    }
}
