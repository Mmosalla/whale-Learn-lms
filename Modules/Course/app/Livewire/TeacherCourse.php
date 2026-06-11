<?php

namespace Modules\Course\Livewire;

use Illuminate\Contracts\View\View;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;
use Modules\Course\Models\Course;

class TeacherCourse extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    #[Layout('panel::components.layouts.app') , Title('دوره های مدرس')]
    public function render(): view
    {
        $courses = Course::query()
            ->where('user_id', auth()->user()->id)
            ->paginate(10);
        return view('course::livewire.teacher-course' , compact('courses'));
    }
}
