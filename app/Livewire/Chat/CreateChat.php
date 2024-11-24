<?php

namespace App\Livewire\Chat;

use App\Models\Conversation;
use App\Models\Message;
use App\Models\User;
use Livewire\Component;

use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Auth;

class CreateChat extends Component
{
    protected $users;
    protected $message = "Hello Peter";
    // public $receivedId;
    public function checkConversation($receivedId) {
        dd($receivedId);
        $conversation_checked = Conversation::where([
            'receiver_id' => Auth::id(),
            'sender_id' => $receivedId
            ])
        ->orWhere([
            'receiver_id' => $receivedId,
            'sender_id' => Auth::id(),
        ])->get();

        if (count($conversation_checked) == 0) {
            $conversation = Conversation::create([
                'sender_id' => Auth::id(),
                'receiver_id' => $receivedId,
                'last_time_message' => 0
            ]);

            $message = Message::create([
                'conversation_id' => $conversation->id,
                'sender_id' => Auth::id(),
                'receiver_id' => $receivedId,
                'body' => $this->message
            ]);

            $conversation->last_time_message = $message->created_at;
            $conversation->save();
        }
        else {
            dd("Conversation Already exists");
        }
    }

    #[Layout('layouts.app')]
    public function render()
    {
        $users = User::where('id','!=', Auth::user()->id)->get();
        return view('livewire.chat.create-chat', compact('users'));
    }

}
