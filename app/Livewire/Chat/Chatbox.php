<?php

namespace App\Livewire\Chat;

use App\Models\User;
use App\Models\Message;
use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\Conversation;

class Chatbox extends Component
{
    public $selected_conversation;
    public $receiver_instance;
    public $paginate_var = 10;
    public $messages;
    public $message_count;

    protected $listeners = ['loadConversation', 'pushedMessage', 'loadMoreMessages'];
    #[On('loadConversation')]
    public function loadConversation(Conversation $conversation, User $receiver) {
        // dd($conversation, "Register", $receiver);
        $this->selected_conversation = $conversation;
        $this->receiver_instance = $receiver;

        $this->message_count = Message::where('conversation_id', $this->selected_conversation->id)->count();
        $this->messages = Message::where('conversation_id', $this->selected_conversation->id)
            ->skip($this->message_count - $this->paginate_var)
            ->take($this->paginate_var)->get();

        $this->dispatch('selectedChat');
    }

    #[On('pushMessage')]
    public function pushMessage($message_id) {
        $new_message = Message::find($message_id);
        $this->messages->push($new_message);
        $this->dispatch('rowChattoBottom');
    }

    public function loadMoreMessages()
    {
        dd("Reached maximum 10");
    }

    public function render()
    {
        // $this->dispatch('rowChattoBottom');
        return view('livewire.chat.chatbox');
    }
}
