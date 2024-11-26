<?php

namespace App\Livewire;

use App\Models\Course;
use Livewire\Attributes\Lazy;
use Livewire\Component;
class Courses extends Component
{

    public function placeholder()
    {
        return <<<'HTML'
        <div>
            <!-- Loading spinner... -->
            Loding
        </div>
        HTML;
    }

//    #[Lazy(isolate: true)]
    public function render()
    {
        $courses = Course::query()->take(10)->get();
        return view('livewire.courses',
        ['courses' => $courses]);
    }
}
