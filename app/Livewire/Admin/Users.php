<?php

namespace App\Livewire\Admin;

use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;
use Livewire\WithPagination;

class Users extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public string $search = '';

    public function render()
    {
        $users = \App\Models\User::query()
            ->when($this->search !== '', fn(Builder $query) => $query->where('username', 'like', '%'. $this->search .'%'))
            ->latest()
            ->paginate(25);

        return view('livewire.admin.users' ,
        ['users' => $users] )
            ->extends('admin.layout')
            ->section('content');
    }
}
