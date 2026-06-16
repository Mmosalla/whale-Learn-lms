<?php

namespace Modules\DetailCoursePage\Livewire;

use Illuminate\Database\Eloquent\Collection;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Modules\Comments\app\Enums\CommentVoteType;
use Modules\Comments\app\Enums\CourseCommentStatus;
use Modules\Comments\Models\CourseComment;
use Modules\Comments\Models\UserCommentVote;
use Modules\Course\Models\Course;

class DetailPage extends Component
{
//    use LivewireAlert;
    public Course $course;

    #[Validate('required')]
    public $text;
    #[Validate('required')]
    public $stars;
//    public $is_buyer=false;

//    public function mount()
//    {
//        if(auth()->user() && StudentCourse::query()->where('user_id', auth()->user()->id)
//                ->where('course_id', $this->course->id)->exists()) {
//            $this->is_buyer=true;
//        }
//    }

//    public function download($season_id, $video)
//    {
//        $course_id =  $this->course->id;
//        return response()->download(
//            "videos/courses/$course_id/$season_id/$video"
//        );
//    }

    public function saveComment(): void
    {
        $this->validate();
        CourseComment::query()->create([
            'user_id'=> auth()->user()->id,
            'course_id' => $this->course->id,
            'text' => $this->text,
            'stars'=>$this->stars,
        ]);
         session()->flash('message','نظر شما ثبت شد و بعد از تایید ادمین نمایش داده می شود');

        $this->reset('text','stars');
//        $this->alert('success', 'نظر شما ثبت شد و بعد از تایید ادمین نمایش داده می شود');
    }


    public function likeComment($comment_id): void
    {
        $comment = CourseComment::query()->findOrFail($comment_id);

        $vote = UserCommentVote::query()->firstOrCreate(
            [
                'user_id' => auth()->id(),
                'course_comment_id' => $comment_id,
            ],
            [
                'type' => CommentVoteType::Like->value
            ]
        );

        if ($vote->wasRecentlyCreated) {
            $comment->increment('likes');
            return;
        }

        if ($vote->type === CommentVoteType::Dislike->value) {
            $vote->update(['type' => CommentVoteType::Like->value]);
            $comment->increment('likes');
            $comment->decrement('dislikes');
        }
    }
    public function dislikeComment($comment_id): void
    {
        $comment = CourseComment::query()->find($comment_id);

        $check = UserCommentVote::query()
            ->where('user_id',auth()->user()->id)
            ->where('course_comment_id',$comment_id)->first();

        if ($check) {

            if($check->type===CommentVoteType::Like->value){
                $check->update([
                    'type'=>CommentVoteType::Dislike->value
                ]);

                $comment->increment('dislikes');
                $comment->decrement('likes');
            }
        }else{
            UserCommentVote::query()->create([
                'user_id'=>auth()->user()->id,
                'course_comment_id'=>$comment_id,
                'type'=> CommentVoteType::Dislike->value
            ]);
            $comment->increment('dislikes');
        }
    }

//    public function buyCourse(): void
//    {
//        $exists = Cart::query()->where('user_id',auth()->user()->id)
//            ->where('course_id', $this->course->id)->exists();
//        if (!$exists) {
//            Cart::query()->create([
//                'user_id'=>auth()->user()->id,
//                'course_id'=> $this->course->id
//            ]);
//        }
//        $this->redirectRoute('user.cart');
//    }

    #[Computed]
    public function comments(): Collection|array
    {
        return CourseComment::query()
            ->where('course_id', $this->course->id)
            ->where('status', CourseCommentStatus::Accepted->value)
            ->get();
    }

    #[Layout('homepage::components.layouts.app'),Title('صفحه جزئیات دوره')]
    public function render()
    {
        return view('detailcoursepage::livewire.detail-page');
    }
}
//Mohsen was here mmosalla36@gmail.com😎
