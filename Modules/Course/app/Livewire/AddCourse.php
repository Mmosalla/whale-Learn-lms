<?php

namespace Modules\Course\Livewire;

use Illuminate\Contracts\View\View;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;
use Modules\Category\app\Models\Category;
use Modules\Course\app\Enums\CourseEnums;
use Modules\Course\Models\Course;

class AddCourse extends Component
{
    use WithFileUploads;
    #[Rule('required')]
    public $category_id;
    #[Rule('required')]
    public $title;
    #[Rule('required')]
    public $price;
    #[Rule('required')]
    public $description;
    #[Rule('required')]
    public $level;
    #[Rule('required')]
    public $video;
    #[Rule('required|mimes:jpg,png')]
    public $image;


    public function createTeacherCourse(): void
    {

        $this->validate();

        $image_name = $this->image->hashName();
        $video_name = $this->video->hashName();


        $course = Course::query()->create([
            'user_id'=>auth()->user()->id,
            'category_id'=>$this->category_id['value'],
            'title'=>$this->title,
            'slug'=>make_slug($this->title),
            'price'=>$this->price,
            'description'=>$this->description,
            'level'=>$this->level['value'],
            'status'=>CourseEnums::Draft->value,
            'video'=>$video_name,
            'image'=>$image_name
        ]);

        $this->image->store("images/courses/$course->id",'public');
        $this->video->store("videos/courses/$course->id/intro",'public');

        session()->flash('message','دوره با موفقیت ثبت شد');
        $this->redirectRoute('admin.teacher_courses');

    }

    #[Layout('panel::components.layouts.app'), Title('افزودن دوره')]
    public function render(): view
    {
        $categories = Category::query()->where('parent_id','!=',0)->pluck('title','id');
        return view('course::livewire.add-course' , compact('categories'));
    }
}



// Mohsen was here mmosalla36@gmail.com 😎
