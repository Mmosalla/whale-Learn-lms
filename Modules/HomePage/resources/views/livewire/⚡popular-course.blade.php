<?php

use Illuminate\Database\Eloquent\Collection;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Modules\Category\app\Models\Category;

new class extends Component {
    public $selected_tab;

    public function mount(): void
    {
        $this->selected_tab = Category::query()
            ->select('categories.*')
            ->join('courses','categories.id','=','courses.category_id')
            ->orderBy('courses.viewed','DESC')
            ->first()->id;
    }

    public function setSelectedTab($category_id): void
    {
        $this->selected_tab=$category_id;
    }
    #[Computed]
    public function categories():Collection
    {
        return Category::query()
            ->select('categories.*')
            ->join('courses','categories.id','=','courses.category_id')
            ->orderBy('courses.viewed','DESC')
            ->limit(5)->get();
    }
};
?>

<section>
    <div class="container">
        <!-- Title -->
        <div class="row mb-4">
            <div class="col-lg-8 mx-auto text-center">
                <h2 class="fs-3">محبوب ترین دوره ها</h2>
                <p class="mb-0">هر موضوعی را در هر زمان مطالعه کنید. هزاران دوره آموزشی را با کمترین قیمت جستجو کنید!</p>
            </div>
        </div>

        <!-- Tabs START -->
        <ul class="nav nav-pills nav-pills-bg-soft justify-content-sm-center mb-4 px-3" id="course-pills-tab" role="tablist">
            @foreach($this->categories as $category)
                <!-- Tab item -->
                <li class="nav-item me-2 me-sm-5" wire:click="setSelectedTab({{$category->id}})">
                    <button class="nav-link mb-2 mb-md-0 @if($selected_tab== $category->id) active @endif" id="course-pills-tab-{{$category->id}}" data-bs-toggle="pill" data-bs-target="#course-pills-tabs-{{$category->id}}" type="button" role="tab" aria-controls="course-pills-tabs-{{$category->id}}" aria-selected="false">{{$category->title}}</button>
                </li>
            @endforeach
        </ul>
        <!-- Tabs END -->

        <!-- Tabs content START -->
        <div class="tab-content" id="course-pills-tabContent">
            @foreach($this->categories as $category)
                <!-- Content START -->
                <div class="tab-pane fade show @if($selected_tab== $category->id) active @endif" id="course-pills-tabs-{{$category->id}}" role="tabpanel" aria-labelledby="course-pills-tab-{{$category->id}}">
                    <div class="row g-4">
                        @foreach($category->courses as $course)
                            <!-- Card item START -->
                            <div class="col-sm-6 col-lg-4 col-xl-3">
                                <div class="card shadow h-100">
                                    <!-- Image -->
                                    <img src="{{url('images/courses/'.$course->id .'/'.$course->image)}}" class="card-img-top" alt="course image">
                                    <!-- Card body -->
                                    <div class="card-body pb-0">
                                        <!-- Badge and favorite -->
                                        <div class="d-flex justify-content-between mb-2">
                                            <a href="#" class="badge bg-purple bg-opacity-10 text-purple">{{$course->level}}</a>
                                            <a href="#" class="h6 mb-0"><i class="far fa-heart"></i></a>
                                        </div>
                                        <!-- Title -->
                                        <h5 class="card-title fw-normal"><a href="#">{{$course->title}}</a></h5>
                                        <p class="mb-2 text-truncate-2">با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک</p>
                                        <!-- Rating star -->
                                        <ul class="list-inline mb-0">
                                            <li class="list-inline-item me-0 small"><i class="fas fa-star text-warning"></i></li>
                                            <li class="list-inline-item me-0 small"><i class="fas fa-star text-warning"></i></li>
                                            <li class="list-inline-item me-0 small"><i class="fas fa-star text-warning"></i></li>
                                            <li class="list-inline-item me-0 small"><i class="fas fa-star text-warning"></i></li>
                                            <li class="list-inline-item me-0 small"><i class="far fa-star text-warning"></i></li>
                                            <li class="list-inline-item ms-2 h6 fw-light mb-0">4.0/5.0</li>
                                        </ul>
                                    </div>
                                    <!-- Card footer -->
                                    <div class="card-footer pt-0 pb-3">
                                        <hr>
                                        <div class="d-flex justify-content-between">
                                            <span class="h6 fw-light mb-0"><i class="far fa-clock text-danger me-2"></i>12دقیقه</span>
                                            <span class="h6 fw-light mb-0"><i class="fas fa-table text-orange me-2"></i>15 ویدیو</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Card item END -->
                        @endforeach


                    </div> <!-- Row END -->
                </div>
                <!-- Content END -->
            @endforeach
        </div>
        <!-- Tabs content END -->
    </div>
</section>

{{--//Mohsen was here mmosalla36@gmail.com 😎--}}
