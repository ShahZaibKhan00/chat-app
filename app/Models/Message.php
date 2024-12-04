<?php

namespace App\Models;

use App\Models\User;
use App\Models\Conversation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Message extends Model
{
    //
    protected $fillable = [
        'conversation_id',
        'sender_id',
        'receiver_id',
        'body',
        'type',
        'seen'
    ];

    // Chat List Format
    protected function getCreatedshortAttribute()
    {
        return $this->created_at->shortAbsoluteDiffForHumans();
    }

    // Chat Box Message Format
    protected function getCreatedformatAttribute()
    {
        return $this->created_at->format('m: i a');
    }

    /**
     * Get the conversation that owns the Message
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function conversation(): BelongsTo
    {
        return $this->belongsTo(Conversation::class);
    }

    /**
     * Get the user that owns the Message
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'sender_id');
    }
}
