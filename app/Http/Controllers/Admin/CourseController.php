<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::query()
            ->latest()
            ->paginate(25);
        return view('admin.pages.courses', compact('courses'));
    }

    public function create()
    {
        return view('admin.pages.course-create');
    }

    public function store(Request $request)
    {
        $request->validate([
           'title' => ['required' , 'string' , 'min:3' , 'max:64' , 'unique:courses,title'] ,
           'description' => ['required' , 'string' , 'min:3' , 'max:5000' ] ,
           'price' => ['nullable'] ,
           'file' => ['nullable' ,'file' , 'mimetypes:png,jpe,jpeg'] ,
        ]);

        Course::query()
            ->create([
                'title' => $request->title,
                'description' => $request->description,
                'price' => $request->price,
            ]);

        return redirect()->route('admin.courses.index');

    }

    public function edit(Course $course)
    {
        return view('admin.pages.course-update', compact('course'));
    }

    public function update(Course $course, Request $request)
    {
        $request->validate([
            'title' => ['required' , 'string' , 'min:3' , 'max:64' , 'unique:courses,title'] ,
            'description' => ['required' , 'string' , 'min:3' , 'max:5000' ] ,
            'price' => ['nullable'] ,
            'file' => ['nullable' ,'file' , 'mimetypes:png,jpe,jpeg'] ,
        ]);

        $course
            ->update([
                'title' => $request->title,
                'description' => $request->description,
                'price' => $request->price,
            ]);
        return redirect()->route('admin.courses.index');

    }

    public function delete(Course $course)
    {
        $course->delete();
        return redirect()->route('admin.courses.index');

    }

}
