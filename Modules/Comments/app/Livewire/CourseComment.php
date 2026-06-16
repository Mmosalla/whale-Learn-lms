<?php

namespace Modules\Comments\Livewire;

use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;
use Modules\Comments\app\Enums\CourseCommentStatus;

class CourseComment extends Component
{
    use WithPagination;
    public function changeCourseCommentStatus($component_id): void
    {
        $comment = \Modules\Comments\Models\CourseComment::query()->findOrFail($component_id);
        if($comment->status === CourseCommentStatus::Draft->value){
            $comment->update([
                'status'=> CourseCommentStatus::Accepted->value
            ]);
        }else if($comment->status === CourseCommentStatus::Accepted->value){
            $comment->update([
                'status'=> CourseCommentStatus::Rejected->value
            ]);
        }else if($comment->status === CourseCommentStatus::Rejected->value) {
            $comment->update([
                'status' => CourseCommentStatus::Draft->value
            ]);
        }
    }

    #[Computed]
    public function comments():Paginator
    {
        return \Modules\Comments\Models\CourseComment::query()
            ->orderBy('created_at','DESC')
            ->paginate(10);
    }
    #[Layout('panel::components.layouts.app'),Title('لیست نظرات دوره ها')]
    public function render(): view
    {
        return view('comments::livewire.course-comment');
    }
}

//Mohsen was here mmosalla36@gmail.com😎
