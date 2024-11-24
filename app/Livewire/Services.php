<?php

namespace App\Livewire;

use App\Models\Course;
use Livewire\Attributes\Lazy;
use Livewire\Component;

class Services extends Component
{

    public function render()
    {
        $courses = Course::query()->take(10)->get();
        return view('livewire.services',
            ['courses' => $courses]);
    }
}
