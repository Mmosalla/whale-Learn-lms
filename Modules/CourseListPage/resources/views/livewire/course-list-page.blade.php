<main>

    <!-- =======================
    Page Banner START -->
    <section class="bg-blue align-items-center d-flex" style="background:url(assets/images/pattern/04.png) no-repeat center center; background-size:cover;">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <!-- Title -->
                    <h1 class="text-white fs-2">لیست دوره ها</h1>
                </div>
            </div>
        </div>
    </section>
    <!-- =======================
    Page Banner END -->

    <!-- =======================
    Page content START -->
    <section class="py-5">
        <div class="container">
            <div class="row">
                <!-- Main content START -->
                <div class="col-lg-8 col-xl-9">

                    <!-- Search option START -->
                    <div class="row mb-4 align-items-center">
                        <!-- Search bar -->
                        <div class="col-xl-6">
                            <form class="border rounded p-2">
                                <div class="input-group input-borderless">
                                    <input wire:model="search" class="form-control me-1" type="search" placeholder="جستجو دوره ...">
                                    <button wire:click="$refresh" type="button" class="btn btn-primary mb-0 rounded z-index-1"><i class="fas fa-search"></i></button>
                                </div>
                            </form>
                        </div>

                        <!-- Select option -->
                        <div class="col-xl-3 mt-3 mt-xl-0">
                            <form class="border rounded p-2 input-borderless">
                                <select wire:model="sort" wire:change="$refresh" class="form-select form-select-sm js-choice border-0" aria-label=".form-select-sm">
                                    <option value="updated">بروزترین</option>
                                    <option value="most_viewed">پربازدیدترین</option>
                                    <option value="most_sold">پرفروش ترین</option>
                                    <option value="newest">جدیدترین</option>
                                </select>
                            </form>
                        </div>

                        <!-- Content -->
                        <div class="col-12 col-xl-3 d-flex justify-content-between align-items-center mt-3 mt-xl-0">
                            <!-- Advanced filter responsive toggler START -->
                            <button class="btn btn-primary mb-0 d-lg-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasSidebar" aria-controls="offcanvasSidebar">
                                <i class="fas fa-sliders-h me-1"></i> نمایش فیلتر
                            </button>
                            <!-- Advanced filter responsive toggler END -->
                        </div>

                    </div>
                    <!-- Search option END -->

                    <!-- Course Grid START -->
                    <div class="row g-4">

                        @foreach($this->courses as $course)
                            <!-- Card item START -->
                            <div class="col-sm-6 col-xl-4">
                                <div class="card shadow h-100">
                                    <!-- Image -->
                                    <img src="{{url('images/courses/'.$course->id.'/'. $course->image)}}" class="card-img-top" alt="course image">
                                    <!-- Card body -->
                                    <div class="card-body pb-0">
                                        <!-- Badge and favorite -->
                                        <div class="d-flex justify-content-between mb-2">
                                            <a href="#" class="badge bg-purple bg-opacity-10 text-purple">همه سطح</a>
                                            <a href="#" class="h6 fw-light mb-0"><i class="far fa-heart"></i></a>
                                        </div>
                                        <!-- Title -->
                                        <h5 class="card-title fw-normal"><a href="{{route('course.details' , $course)}}">{{$course->title}}</a></h5>
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
                    </div>
                    <!-- Course Grid END -->

                    <!-- Pagination START -->
                    <div class="col-12">
                        {{$this->courses->links('homepage::components.layouts.pagination')}}
                    </div>
                    <!-- Pagination END -->
                </div>
                <!-- Main content END -->

                <!-- Right sidebar START -->
                <div class="col-lg-4 col-xl-3">
                    <!-- Responsive offcanvas body START -->
                    <div class="offcanvas-lg offcanvas-end" tabindex="-1" id="offcanvasSidebar">
                        <div class="offcanvas-header bg-light">
                            <h5 class="offcanvas-title" id="offcanvasNavbarLabel">جستجوی پیشرفته</h5>
                            <button  type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#offcanvasSidebar" aria-label="Close"></button>
                        </div>
                        <div class="offcanvas-body p-3 p-lg-0">
                            <form>
                                <!-- Category START -->
                                <div class="card card-body shadow p-4 mb-4">
                                    <!-- Title -->
                                    <h4 class="mb-3 fs-6">فیلتر دسته بندی</h4>
                                    <!-- Category group -->
                                    <div class="col-12">
                                        <!-- Checkbox -->
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault9">
                                                <label class="form-check-label" for="flexCheckDefault9">همه</label>
                                            </div>
                                            <span class="small">({{count($this->courses)}})</span>
                                        </div>
                                        <!-- Checkbox -->
                                        @foreach($this->categories as $category)
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="form-check" wire:click="setSelectedCategory({{$category->id}})">
                                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault10">
                                                    <label class="form-check-label" for="flexCheckDefault10">{{$category->title}}</label>
                                                </div>
                                                <span class="small">({{$category->courses_count}})</span>
                                            </div>
                                        @endforeach
                                        <!-- Checkbox -->
                                    </div>
                                </div>
                                <!-- Category END -->

                                <!-- Price START -->
                                <div class="card card-body shadow p-4 mb-4">
                                    <!-- Title -->
                                    <h4 class="mb-3 fs-6">فیلتر قیمت</h4>
                                    <ul class="list-inline mb-0">
                                        <!-- Rent -->
                                        <li class="list-inline-item">
                                            <input type="radio" class="btn-check" name="options" id="option1">
                                            <label class="btn btn-light btn-primary-soft-check" for="option1">همه</label>
                                        </li>
                                        <!-- Sale -->
                                        <li class="list-inline-item">
                                            <input type="radio" class="btn-check" name="options" id="option2">
                                            <label class="btn btn-light btn-primary-soft-check" for="option2">رایگان</label>
                                        </li>
                                        <!-- Buy -->
                                        <li class="list-inline-item">
                                            <input type="radio" class="btn-check" name="options" id="option3">
                                            <label class="btn btn-light btn-primary-soft-check" for="option3">خریدنی</label>
                                        </li>
                                    </ul>
                                </div>
                                <!-- Price END -->

                                <!-- Skill level START -->
                                <div class="card card-body shadow p-4 mb-4">
                                    <!-- Title -->
                                    <h4 class="mb-3 fs-6">فیلتر سطح مهارت</h4>
                                    <ul class="list-inline mb-0">
                                        <!-- Item -->
                                        <li class="list-inline-item mb-2">
                                            <input type="checkbox" class="btn-check" id="btn-check-12">
                                            <label class="btn btn-light btn-primary-soft-check" for="btn-check-12">همه سطح</label>
                                        </li>
                                        <!-- Item -->
                                        <li class="list-inline-item mb-2">
                                            <input type="checkbox" class="btn-check" id="btn-check-9">
                                            <label class="btn btn-light btn-primary-soft-check" for="btn-check-9">مبتدی</label>
                                        </li>
                                        <!-- Item -->
                                        <li class="list-inline-item mb-2">
                                            <input type="checkbox" class="btn-check" id="btn-check-10">
                                            <label class="btn btn-light btn-primary-soft-check" for="btn-check-10">مقدماتی</label>
                                        </li>
                                        <!-- Item -->
                                        <li class="list-inline-item mb-2">
                                            <input type="checkbox" class="btn-check" id="btn-check-11">
                                            <label class="btn btn-light btn-primary-soft-check" for="btn-check-11">پیشرفته</label>
                                        </li>
                                    </ul>
                                </div>
                                <!-- Skill level END -->

                                <!-- Language START -->
                                <div class="card card-body shadow p-4 mb-4">
                                    <!-- Title -->
                                    <h4 class="mb-3 fs-6">فیلتر زبان</h4>
                                    <ul class="list-inline mb-0 g-3">
                                        <!-- Item -->
                                        <li class="list-inline-item mb-2">
                                            <input type="checkbox" class="btn-check" id="btn-check-2">
                                            <label class="btn btn-light btn-primary-soft-check" for="btn-check-2">انگلیسی</label>
                                        </li>
                                        <!-- Item -->
                                        <li class="list-inline-item mb-2">
                                            <input type="checkbox" class="btn-check" id="btn-check-3">
                                            <label class="btn btn-light btn-primary-soft-check" for="btn-check-3">فرانسه</label>
                                        </li>
                                        <!-- Item -->
                                        <li class="list-inline-item mb-2">
                                            <input type="checkbox" class="btn-check" id="btn-check-4">
                                            <label class="btn btn-light btn-primary-soft-check" for="btn-check-4">هند</label>
                                        </li>
                                        <!-- Item -->
                                        <li class="list-inline-item mb-2">
                                            <input type="checkbox" class="btn-check" id="btn-check-5">
                                            <label class="btn btn-light btn-primary-soft-check" for="btn-check-5">روسی</label>
                                        </li>
                                        <!-- Item -->
                                        <li class="list-inline-item mb-2">
                                            <input type="checkbox" class="btn-check" id="btn-check-6">
                                            <label class="btn btn-light btn-primary-soft-check" for="btn-check-6">اسپانیا</label>
                                        </li>
                                        <!-- Item -->
                                        <li class="list-inline-item mb-2">
                                            <input type="checkbox" class="btn-check" id="btn-check-7">
                                            <label class="btn btn-light btn-primary-soft-check" for="btn-check-7">ایتالیا</label>
                                        </li>
                                        <!-- Item -->
                                        <li class="list-inline-item mb-2">
                                            <input type="checkbox" class="btn-check" id="btn-check-8">
                                            <label class="btn btn-light btn-primary-soft-check" for="btn-check-8">آلمان</label>
                                        </li>
                                    </ul>
                                </div>
                                <!-- Language END -->
                            </form><!-- Form End -->
                        </div>
                    </div>
                    <!-- Responsive offcanvas body END -->
                </div>
                <!-- Right sidebar END -->
            </div><!-- Row END -->
        </div>
    </section>
    <!-- =======================
    Page content END -->

    <!-- =======================
    Newsletter START -->
    <section class="pt-0">
        <div class="container position-relative overflow-hidden">
            <!-- SVG decoration -->
            <figure class="position-absolute top-50 start-50 translate-middle ms-3">
                <svg>
                    <path d="m496 22.999c0 10.493-8.506 18.999-18.999 18.999s-19-8.506-19-18.999 8.507-18.999 19-18.999 18.999 8.506 18.999 18.999z" fill="#fff" fill-rule="evenodd" opacity=".502"/>
                    <path d="m775 102.5c0 5.799-4.701 10.5-10.5 10.5-5.798 0-10.499-4.701-10.499-10.5 0-5.798 4.701-10.499 10.499-10.499 5.799 0 10.5 4.701 10.5 10.499z" fill="#fff" fill-rule="evenodd" opacity=".102"/>
                    <path d="m192 102c0 6.626-5.373 11.999-12 11.999s-11.999-5.373-11.999-11.999c0-6.628 5.372-12 11.999-12s12 5.372 12 12z" fill="#fff" fill-rule="evenodd" opacity=".2"/>
                    <path d="m20.499 10.25c0 5.66-4.589 10.249-10.25 10.249-5.66 0-10.249-4.589-10.249-10.249-0-5.661 4.589-10.25 10.249-10.25 5.661-0 10.25 4.589 10.25 10.25z" fill="#fff" fill-rule="evenodd" opacity=".2"/>
                </svg>
            </figure>
            <!-- Svg decoration -->
            <figure class="position-absolute bottom-0 end-0 mb-5 d-none d-sm-block">
                <svg class="rotate-130" width="258.7px" height="86.9px" viewBox="0 0 258.7 86.9">
                    <path stroke="white" fill="none" stroke-width="2" d="M0,7.2c16,0,16,25.5,31.9,25.5c16,0,16-25.5,31.9-25.5c16,0,16,25.5,31.9,25.5c16,0,16-25.5,31.9-25.5 c16,0,16,25.5,31.9,25.5c16,0,16-25.5,31.9-25.5c16,0,16,25.5,31.9,25.5s16-25.5,31.9-25.5"/>
                    <path stroke="white" fill="none" stroke-width="2" d="M0,57c16,0,16,25.5,31.9,25.5c16,0,16-25.5,31.9-25.5c16,0,16,25.5,31.9,25.5c16,0,16-25.5,31.9-25.5 c16,0,16,25.5,31.9,25.5c16,0,16-25.5,31.9-25.5c16,0,16,25.5,31.9,25.5s16-25.5,31.9-25.5"/>
                </svg>
            </figure>

            <div class="bg-grad-pink p-3 p-sm-5 rounded-3">
                <div class="row justify-content-center position-relative">
                    <!-- SVG decoration -->
                    <figure class="fill-white opacity-1 position-absolute top-50 start-0 translate-middle-y">
                        <svg width="141px" height="141px">
                            <path d="M140.520,70.258 C140.520,109.064 109.062,140.519 70.258,140.519 C31.454,140.519 -0.004,109.064 -0.004,70.258 C-0.004,31.455 31.454,-0.003 70.258,-0.003 C109.062,-0.003 140.520,31.455 140.520,70.258 Z"/>
                        </svg>
                    </figure>
                    <!-- Newsletter -->
                    <div class="col-12 position-relative my-2 my-sm-3">
                        <div class="row align-items-center">
                            <!-- Title -->
                            <div class="col-lg-6">
                                <h3 class="text-white mb-3 mb-lg-0 ff-vb">دریافت جدیدترین به‌روزرسانی‌های دوره، در خبرنامه ما</h3>
                            </div>
                            <!-- Input item -->
                            <div class="col-lg-6 text-lg-end">
                                <form class="bg-body rounded p-2">
                                    <div class="input-group">
                                        <input class="form-control border-0 me-1" type="email" placeholder="ایمیل">
                                        <button type="button" class="btn btn-dark mb-0 rounded">عضویت</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div> <!-- Row END -->
            </div>
        </div>
    </section>
    <!-- =======================
    Newsletter END -->

</main>

{{--Mohsen was here mmosalla36@gmail.com😎--}}
