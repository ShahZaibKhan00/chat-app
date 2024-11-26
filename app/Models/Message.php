<?php

namespace App\Models;

use App\Models\User;
use App\Models\Conversation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
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

    protected function createdAt(): Attribute
    {
        // return Attribute::get(fn($value) => $value->diffForHumans(now(), CarbonInterface::DIFF_RELATIVE_AUTO, true));
        return Attribute::get(fn($value) => \Carbon\Carbon::parse($value)->shortAbsoluteDiffForHumans());
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
