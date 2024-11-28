<?php

namespace App\Livewire\Chat;

use App\Models\User;
use App\Models\Message;
use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\Conversation;

class Chatbox extends Component
{
    // #[On('loadConversation')]

    public $selected_conversation, $receiver_instance;
    public $paginate_var = 10;
    public $message, $message_count;

    // protected $listeners = ['loadConversation'];

    public function loadConversation(Conversation $conversation, User $receiver) {
        dd($conversation, "Register", $receiver);
        $this->selected_conversation = $conversation;
        $this->receiver_instance = $receiver;

        $this->message_count = Message::where('conversation_id', $this->selected_conversation->id)->count();
        $this->message = Message::where('conversation_id', $this->selected_conversation->id)
            ->skip($this->message_count - $this->paginate_var)
            ->take($this->paginate_var)->get();
    }

    public function render()
    {
        return view('livewire.chat.chatbox');
    }
}
