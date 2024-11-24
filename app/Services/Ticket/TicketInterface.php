<?php

namespace App\Services\Ticket;

use App\Models\Chat;
use App\Models\ChatMessage;
use App\Models\User;

interface TicketInterface
{
    public function createTicket($message, $user_id);
    public function createMessage($message, Chat $chat, $user_id);
//    public function createMessageByAdmin($message, Chat $chat, $user_id);
    public function assignRead(ChatMessage $message);
    public function userMessages(User $user);
}
