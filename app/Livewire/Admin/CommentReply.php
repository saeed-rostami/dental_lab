<?php

namespace App\Livewire\Admin;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CommentReply extends Component
{
    public \App\Models\Comment $comment;
    public $comment_reply = '';

    public function mount(\App\Models\Comment $comment)
    {
        $this->comment = $comment;
    }

    public function reply()
    {
        $this->validate([
            'comment_reply' => ['required' , 'string']
        ]);
        \App\Models\Comment::query()
            ->updateOrCreate([
                'user_id' => Auth::id(),
                'reply_id' => $this->comment->id,
                'course_id' => $this->comment->course->id
            ], [
                'comment' => $this->comment_reply,
                'user_id' => Auth::id(),
                'reply_id' => $this->comment->id,
                'course_id' => $this->comment->course->id
            ]);

        \notyf()
            ->position('x', 'right')
            ->position('y', 'bottom')
            ->duration(5000)
            ->success('پاسخ شما با موفقیت ثبت شد' )
        ;

        $this->redirectRoute('admin.comment.index' , '' , true, true);
    }

    public function render()
    {
        return view('livewire.admin.comment-reply', ['comment' => $this->comment])
            ->extends('admin.layout')
            ->section('content');
    }
}
