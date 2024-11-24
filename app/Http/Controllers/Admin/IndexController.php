<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ChatMessage;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $users_count = \Illuminate\Support\Facades\DB::table('users')
            ->count();

        $courses_count = \Illuminate\Support\Facades\DB::table('courses')
            ->count();

        $new_messages =  ChatMessage::query()
        ->whereHas('user' , function (Builder $q) {
            $q->whereNot('is_admin' , true);
        })
        ->whereNot('is_read' , true)
        ->count();

        return view('admin.pages.index', compact(['courses_count', 'users_count' , 'new_messages']));
    }
}
