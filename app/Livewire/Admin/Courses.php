<?php

namespace App\Livewire\Admin;

use App\Models\Course;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;
use Livewire\WithPagination;

class Courses extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public string $search = '';

    public function delete($course_id)
    {
        $course = Course::query()->find($course_id['id']);

        $course->delete();
        \notyf()
            ->position('x', 'right')
            ->position('y', 'bottom')
            ->duration(5000)
            ->success('دوره با موفقیت حذف شد' )
        ;
    }

    public function render()
    {
        $courses = Course::query()
            ->when($this->search !== '', fn(Builder $query) => $query->where('title', 'like', '%'. $this->search .'%'))
            ->latest()
            ->paginate(25);

        return view('livewire.admin.courses' ,
        ['courses' => $courses]
        )
            ->extends('admin.layout')
            ->section('content');
    }
}
