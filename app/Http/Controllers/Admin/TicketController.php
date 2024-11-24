<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Chat;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use MongoDB\Laravel\Eloquent\Builder;

class TicketController extends Controller
{
    public function index()
    {
        $only_ne_messages = \request()->has('new');
        if ($only_ne_messages) {
            $chats = Chat::query()
                ->WithUnreadMessage()
                ->latest()
                ->paginate(25);
        }
        else {
            $chats = Chat::query()
                ->latest()
                ->paginate(25);
        }

        return view('admin.pages.tickets', compact('chats'));
    }

    public function show(Chat $chat)
    {
        ;
        $messages = $chat->messages()
            ->whereHas('user', function (Builder $q) {
                $q->whereNot('is_admin', true);
            })
            ->get();

        foreach ($messages as $message) {
            $message->update([
                'is_read' => true
            ]);
        }

        return view('admin.pages.ticket-messages', compact('chat'));
    }
}
