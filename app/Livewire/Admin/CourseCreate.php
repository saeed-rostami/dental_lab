<?php

namespace App\Livewire\Admin;

use App\Models\Course;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class CourseCreate extends Component
{
    use WithFileUploads;

    #[Validate(['nullable', 'file'])]
    public $image;
    #[Validate(['required', 'string'])]
    public $title;
    #[Validate(['required', 'string'])]
    public $description;
    #[Validate(['required'])]
    public $price;

    public function store()
    {
        $this->validate();

        if ($this->image) {
           $path = $this->image->store('images/courses' , 'public');
        }
        Course::query()
            ->create([
                'title' => $this->title,
                'description' => $this->description,
                'price' => $this->price,
                'image_path' => $path ?? null,
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
