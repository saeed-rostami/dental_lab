<?php

namespace App\Livewire\Admin;

use App\Models\Course;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CourseCreate extends Component
{
    #[Validate(['required', 'string'])]
    public $title;
    #[Validate(['required', 'string'])]
    public $description;
    #[Validate(['required'])]
    public $price;

    public function store()
    {
        $this->validate();

        Course::query()
            ->create([
                'title' => $this->title,
                'description' => $this->description,
                'price' => $this->price,

            ]);

        \notyf()
            ->position('x', 'right')
            ->position('y', 'bottom')
            ->duration(5000)
            ->success('دوره جدید با موفقیت ایجاد شد' )
        ;

        $this->redirectRoute('admin.courses.index' , '' , true, true);
    }

    public function render()
    {
        return view('livewire.admin.course-create')
            ->extends('admin.layout')
            ->section('content');
    }
}
