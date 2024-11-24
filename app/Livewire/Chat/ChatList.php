<?php

namespace App\Livewire\Chat;

use App\Models\Conversation;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class ChatList extends Component
{
    protected $auth_id;
    protected $conversations;

    function mount()
    {
        $this->auth_id = Auth::id();
        $this->conversations = Conversation::where('sender_id', $this->auth_id)
            ->orWhere('receiver_id', $this->auth_id)
            ->orderBy('last_time_message', 'DESC')->get();

    }

    public function render()
    {
        return view('livewire.chat.chat-list', ['conversations' => $this->conversations]);
    }
}
