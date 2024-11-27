<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Builder;
use MongoDB\Laravel\Eloquent\Model;
use MongoDB\Laravel\Eloquent\SoftDeletes;
use MongoDB\Laravel\Relations\HasMany;

class Course extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [
        'id'
    ];

    protected $table = 'courses';
    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public function usersCounts(): int
    {
       return $this->comments()->whereHas('user', function (Builder $r) {
            $r->whereNull('is_admin');
        })
            ->count();
    }
}
