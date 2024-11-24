<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Component;

class UserName extends Component
{
    #[Validate(['required' , 'string' , 'unique:users,username' , 'max:32' , 'min:3'])]
    public $username;
    public function updateUsername()
    {
        $user = Auth::user();
        $user->update([
            'username' => $this->username
        ]);
        $this->redirectRoute('home',
            '',
            true,
            true,
        );

        \notyf()
            ->position('x', 'center')
            ->position('y', 'bottom')
            ->duration(5000)
            ->success('خوش آمدید !' )
        ;
    }
    public function render()
    {
        return view('livewire.user-name');
    }
}
