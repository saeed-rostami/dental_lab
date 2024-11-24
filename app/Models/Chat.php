<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use MongoDB\Laravel\Eloquent\Model;
use MongoDB\Laravel\Relations\BelongsTo;
use MongoDB\Laravel\Relations\HasMany;
use MongoDB\Laravel\Relations\HasOne;

class Chat extends Model
{
    protected $guarded = [
        'id'
    ];
    protected $table = 'chats';

    public function messages(): HasMany
    {
        return $this->hasMany(ChatMessage::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function getHasUnReadMessageAttribute(): int
    {
        return $this->messages()
            ->whereHas('user' , function (Builder $q) {
                $q->whereNot('is_admin' , true);
            })
            ->whereNot('is_read' , true)
            ->count();
    }

    public function scopeWithUnreadMessage(Builder $q)
    {
        $q->whereHas('messages', function ($s) {
            $s->whereHas('user', function ($r) {
                $r->whereNot('is_admin', true);
            })
                ->whereNot('is_read', true);
        })
            ->get()
            ;
    }

}
