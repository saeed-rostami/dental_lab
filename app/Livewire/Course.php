<?php

namespace App\Livewire;

use Livewire\Component;

class Course extends Component
{
    public $course_id;

    public function mount($course_id)
    {
      $this->course_id = $course_id;
    }
    public function render()
    {
        return view('livewire.course', ['course' => \App\Models\Course::query()->find($this->course_id)]);
    }
}
