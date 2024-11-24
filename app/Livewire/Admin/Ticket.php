<?php

namespace App\Livewire\Admin;

use App\Models\Chat;
use App\Services\Ticket\TicketService;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Ticket extends Component
{
    public Chat $chat;

    #[Validate(['required', 'string'])]
    public $message;
    protected $messageService;
    public function mount($chat)
    {
        $this->chat = $chat;
    }
    public function __construct()
    {
        $this->messageService = new TicketService();
    }

    public function sendMessage(): void
    {
        $this->validate();
        $user = Auth::user();

        $this->messageService->createMessage($this->message, $this->chat, $user->id);

        $this->reset(['message']);
    }

    public function render()
    {
        return view('livewire.admin.ticket', ['chat' => $this->chat])
            ->extends('admin.layout')
            ->section('content');
    }
}
