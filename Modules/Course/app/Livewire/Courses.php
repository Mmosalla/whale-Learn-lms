<?php

namespace Modules\Course\Livewire;

use Illuminate\Contracts\View\View;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;
use Modules\Course\app\Enums\CourseEnums;
use Modules\Course\Models\Course;
use Modules\User\app\Models\User;

class Courses extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function chengStatusCourse($id): void
    {
        $course = Course::query()->findOrFail($id);
        if ($course->status === CourseEnums::Default->value) {
            $course->update(['status' => CourseEnums::Active->value]);
            $this->dispatch('statusChanged');
        } else if ($course->status === CourseEnums::Active->value) {
            $course->update(['status' => CourseEnums::Rejected->value]);
            $this->dispatch('statusChanged');
        } else if ($course->status === CourseEnums::Rejected->value) {
            $course->update(['status' => CourseEnums::Archived->value]);
            $this->dispatch('statusChanged');
        } else if ($course->status === CourseEnums::Archived->value) {
            $course->update(['status' => CourseEnums::Default->value]);
            $this->dispatch('statusChanged');
        }
    }


    #[Layout('panel::components.layouts.app'), Title('دوره ها')]
    public function render(): view
    {
        $courses = Course::query()->paginate(10);
        return view('course::livewire.courses', compact('courses'));
    }
}


// Mohsen was here mmosalla@gamil.com 😎
