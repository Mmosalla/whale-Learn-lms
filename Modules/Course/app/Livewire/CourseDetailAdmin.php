<?php

namespace Modules\Course\Livewire;

use Illuminate\Contracts\View\View;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;
use Modules\Course\app\Enums\LessonEnums;
use Modules\Course\Models\Lesson;
use Modules\Course\Models\Season;

class CourseDetailAdmin extends Component
{
    use WithFileUploads;

    public $course_id,$title,$season_id,$attachment,
        $lesson_title,$lesson_e_title,$video,$is_free;

    public function mount($course_id): void
    {
        $this->course_id = $course_id;
    }

    public function addSeason(): void
    {
        $this->validate([
            'title'=>'required'
        ]);
        $season =Season::query()->where('course_id', $this->course_id)->latest()->first();
        if($season){
            Season::query()->create([
                'user_id'=>auth()->user()->id,
                'course_id'=>$this->course_id,
                'title'=>$this->title,
                'priority'=>$season->priority+1,
            ]);
        }else{
            Season::query()->create([
                'user_id'=>auth()->user()->id,
                'course_id'=>$this->course_id,
                'title'=>$this->title,
                'priority'=>1,
            ]);
        }

        $this->dispatch('closeSeasonModal');
        $this->dispatch('addSeason');


    }

    public function AddLesson(): void
    {
        $this->validate([
            'lesson_title'=> 'required',
            'lesson_e_title'=> 'required',
            'video'=> 'required',
            'is_free'=> 'required',
        ]);
        if($this->attachment){
            $attachment_name = $this->attachment->hashName();
        }

        $video_name = $this->video->hashName();

        Lesson::query()->create([
            'user_id'=>auth()->user()->id,
            'season_id'=>$this->season_id,
            'title'=>$this->lesson_title,
            'e_title'=>$this->lesson_e_title,
            'status'=>LessonEnums::Draft->value,
            'video'=>$video_name,
            'attachment'=>$this->attachment ? $attachment_name : null,
            'is_free'=>$this->is_free ?? false,
        ]);

        if($this->attachment){
            $this->attachment->store("attachments/courses/$this->course_id/$this->season_id",'public');
        }

        $this->video->store("videos/courses/$this->course_id/$this->season_id",'public');

        $this->dispatch('closeLessonModal');
        $this->dispatch('lessonAdded');

    }
    #[Layout('panel::components.layouts.app'), Title('جزئیات دوره')]
    public function render(): view
    {
        $seasons = Season::query()->where('course_id', $this->course_id)
            ->orderBy('priority','ASC')->get();
        return view('course::livewire.course-detail' , compact('seasons'));
    }
}

//Mohsen was here mmosalla36@gmail.com 😎
