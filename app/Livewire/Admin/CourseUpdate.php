<?php

namespace App\Livewire\Admin;

use App\Models\Course;
use Livewire\Component;

class CourseUpdate extends Component
{
    public Course $course;
    public $title;
    public $description;
    public $price;
    public function mount(Course $course)
    {
        $this->course = $course;
        $this->title = $course->title;
        $this->description = $course->description;
        $this->price = $course->price;
    }

    public function update()
    {
        $this->validate([
            'title' => ['required' , 'string' , 'max:64'],
            'description' => ['required' , 'string' , 'max:5000'],
            'price' => ['required' , 'int'],
        ]);

        $this->course
            ->update([
                'title' => $this->title,
                'description' => $this->description,
                'price' => $this->price,
            ]);

        \notyf()
            ->position('x', 'right')
            ->position('y', 'bottom')
            ->duration(5000)
            ->success('دوره با بروزرسانی ایجاد شد' )
        ;

        $this->redirectRoute('admin.courses.index', '', true, true);
    }

    public function render()
    {
        return view('livewire.admin.course-update')
            ->extends('admin.layout')
            ->section('content');
    }
}
