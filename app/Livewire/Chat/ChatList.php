<?php

namespace App\Livewire\Chat;

use App\Models\Conversation;
use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ChatList extends Component
{
    protected $auth_id;
    public $conversations;
    public $receiver_instance;
    // public $receiver_name;
    public $selected_chat;

    protected $listeners = ['chatSelected'];

    function mount()
    {
        $this->auth_id = Auth::id();
        $this->conversations = Conversation::where('sender_id', $this->auth_id)
            ->orWhere('receiver_id', $this->auth_id)
            ->orderBy('last_time_message', 'DESC')->get();
    }

    function getUserChatInstance(Conversation $conversation, $request) {
        $this->auth_id = Auth::id();

        if ($conversation->sender_id == $this->auth_id) {
            $this->receiver_instance = User::firstWhere('id', $conversation->receiver_id);
        }
        else
            $this->receiver_instance = User::firstWhere('id', $conversation->receiver_id);

        if (isset($request)) {
            return $this->receiver_instance->$request;
        }
    }

    function chatSelected(Conversation $conversation, $receiver_id) {

        // dd($conversation, $receiver_id);
        $this->selected_chat = $conversation;
        $this->receiver_instance = User::find($receiver_id);
    }

    public function render()
    {
        return view('livewire.chat.chat-list');
    }
}
