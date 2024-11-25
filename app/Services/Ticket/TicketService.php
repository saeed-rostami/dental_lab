<?php

namespace App\Services\Ticket;

use App\Models\Chat;
use App\Models\ChatMessage;

class TicketService implements TicketInterface
{
    protected Chat $chat;
    public function createTicket($message, $user_id): void
    {
        $chat = Chat::query()
            ->create([
               'user_id' => $user_id
            ]);

        $chat->messages()->create([
           'message' => $message,
           'user_id' => $user_id,
        ]);
    }

    public function createMessage($message, $chat, $user_id): void
    {
        ChatMessage::query()
            ->create([
                'chat_id' => $chat->id,
                'message' => $message,
                'user_id' => $user_id,
            ]);
    }

//    public function createMessageByAdmin($message, $chat, $user_id)
//    {
//        $chat->messages()->create([
//            'message' => $message,
//            'user_id' => $user_id,
//        ]);
//    }

    public function assignRead($message): void
    {
        $message->update([
           'is_read' => true
        ]);
    }

    public function userMessages($user)
    {
        return $user->chat?->messages ?? null;
    }
}
