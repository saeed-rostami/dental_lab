<?php

namespace App\Livewire\Admin;

use App\Models\Chat;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class Tickets extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';


    public string $search = '';

    #[Url]
    public ?string $new = '';

    public function render()
    {
        if ($this->new == 1) {
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

        return view('livewire.admin.tickets',
        ['chats' => $chats])
            ->extends('admin.layout')
            ->section('content');
    }
}
