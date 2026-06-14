<?php

namespace Modules\CourseListPage\Livewire;

use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;
use Modules\Category\app\Models\Category;
use Modules\Course\app\Enums\CourseEnums;
use Modules\Course\Models\Course;

class CourseListPage extends Component
{
    use WithPagination;

    public $search;
    public $sort;
    public $selectedCategories=[];

    public function updated($search){
        $this->resetPage();
    }

    public function setSelectedCategory($id): void
    {
        if(in_array($id, $this->selectedCategories)){
            $this->selectedCategories= array_diff($this->selectedCategories, [$id]);
        }else{
            $this->selectedCategories[] = $id;
        }
    }

    #[Computed()]
    public function courses():Paginator
    {
        return Course::query()
            ->where('status',CourseEnums::Active->value)
            ->where('title','like','%'. $this->search .'%')
            ->when($this->sort==='newest',function ($q){
                $q->orderBy('created_at','DESC');
            })
            ->when($this->sort==='most_viewed',function ($q){
                $q->orderBy('viewed','DESC');
            })
            ->when($this->sort==='most_sold',function ($q){
                $q->orderBy('sold','DESC');
            })
            ->when($this->selectedCategories ,function ($q){
                $q->whereIn('category_id', $this->selectedCategories);
            })
            ->orderBy("updated_at","desc")
            ->paginate(9);
    }

    #[Computed(cache: true , key: 'categories')]
    public function categories()
    {
        return Category::query()
            ->withCount('courses')
            ->where('parent_id','!=',null)
            ->get();
    }

    #[Layout('homepage::components.layouts.app') , Title('لیست دوره ها')]
    public function render(): view
    {
        return view('courselistpage::livewire.course-list-page');
    }
}
//Mohsen was here mmosalla36@gmail.com 😎
