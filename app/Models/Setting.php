<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $guarded = [
        'id'
    ];

    protected $table = 'settings';
}
