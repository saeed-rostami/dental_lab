<?php

namespace App\Livewire;

use App\Models\ChatMessage;
use App\Models\User;
use App\Services\Ticket\TicketInterface;
use App\Services\Ticket\TicketService;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Chat extends Component
{
    #[Validate(['required' , 'string'])]
    public $message;
    protected $messageService;
    public function __construct()
    {
        $this->messageService = new TicketService();
    }
    public function sendMessage()
    {
        $this->validate();
        $user = Auth::user();
        $openTicket = $user->chat()->exists();

        if ($openTicket) {
            $this->messageService->createMessage($this->message, $user->chat, $user->id);
        }
        else {
            $this->messageService->createTicket($this->message, $user->id);
        }
        $this->reset();
    }
    public function render()
    {
        $messages = $this->messageService->userMessages(Auth::user()) ?? null;
        return view('livewire.chat' , ['messages' => $messages]);
    }
}
