<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasOne;
use MongoDB\Laravel\Eloquent\Builder;
use MongoDB\Laravel\Eloquent\Model;
use MongoDB\Laravel\Relations\BelongsTo;

class Comment extends Model
{
    protected $guarded = [
        'id'
    ];

    protected $table = 'comments';

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function reply(): HasOne
    {
        return $this->hasOne(Comment::class , 'reply_id');
    }

    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }

    public function scopeOnlyUsers(Builder $q)
    {
        $q->whereHas('user', function (Builder $w) {
            $w->whereNull('is_admin');
        })
        ;
    }
}
