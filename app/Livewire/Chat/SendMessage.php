<?php

namespace App\Livewire\Chat;

use App\Models\User;
use App\Models\Message;
use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\Conversation;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;

class SendMessage extends Component
{
    public $selected_conversation;
    public $receiver_instance;

    #[Validate('required')]
    public $body;
    protected $listeners = ['updateSendMessage'];

    #[On('updateSendMessage')]
    public function updateSendMessage(Conversation $conversation, User $receiver)
    {
        // dd($conversation, $receiver);
        $this->selected_conversation = $conversation;
        $this->receiver_instance = $receiver;
    }

    public function sendMessage()
    {
        $this->validate();
        $message = Message::create([
            'conversation_id' => $this->selected_conversation->id,
            'sender_id' => Auth::id(),
            'receiver_id' => $this->receiver_instance->id,
            'body' => $this->body,
        ]);

        // Will update the ChatList last message time/day
        $this->selected_conversation->last_time_message = $message->created_at;
        $this->selected_conversation->save();

        $this->dispatch('pushMessage', $message->id);
        $this->dispatch('refreshMessage');
        $this->reset('body');
    }
    
    public function render()
    {
        return view('livewire.chat.send-message');
    }
}
