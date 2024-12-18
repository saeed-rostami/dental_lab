<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Comment extends Component
{
    public $comment;
//    public $comments;
    public $course;

    public function mount( $course)
    {
//        $this->comments = $comments;
        $this->course = $course;
    }

    public function save()
    {
        if (!Auth::check()) {
            \notyf()
                ->position('x', 'right')
                ->position('y', 'bottom')
                ->duration(5000)
                ->error('ابتدا وارد حساب کاربری شوید' )
            ;
            return false;
        }

        $comment_ex = \App\Models\Comment::query()
            ->where('user_id', Auth::id())
            ->where('course_id', $this->course->id)
            ->whereBetween('created_at', [now()->subHour(), now()])
            ->exists();
        if ($comment_ex) {
            \notyf()
                ->position('x', 'right')
                ->position('y', 'bottom')
                ->duration(5000)
                ->error('به محدودیت ارسال کامنت در یک ساعت رسیدید' )
            ;
            return false;
        }


        $this->validate([
            'comment' => ['required', 'string' , 'max:500' , 'min:3']
        ]);

        \App\Models\Comment::query()
            ->create([
                'user_id' => Auth::id(),
                'comment' => $this->comment,
                'course_id' => $this->course->id,
                'reply_id' => null,
            ]);
        $this->reset(['comment']);

    }

    public function render()
    {
        $comments = $this->course->comments;
        return view('livewire.comment' , ['comments' => $comments]);
    }
}
