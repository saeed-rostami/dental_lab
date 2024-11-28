<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;

class Comment extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $comments = \App\Models\Comment::query()
            ->OnlyUsers()
            ->latest()
            ->paginate(25);
        return view('livewire.admin.comment', ['comments' => $comments])
            ->extends('admin.layout')
            ->section('content');
    }
}
