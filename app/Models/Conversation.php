<?php

namespace App\Models;

use App\Models\User;
use App\Models\Message;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Conversation extends Model
{
    protected $fillable = [
        'sender_id',
        'receiver_id',
        'last_time_message'
    ];

    /**
     * Get all of the message for the Conversation
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function message(): HasMany
    {
        return $this->hasMany(Message::class);
    }

    /**
     * Get the user that owns the Conversation
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
