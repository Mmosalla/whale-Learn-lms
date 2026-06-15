<main>
    <section class="bg-light py-0 py-sm-5">
        <div class="container">
            <div class="row py-5">
                <div class="col-lg-8">
                    <!-- Badge -->
                    <h6 class="mb-3 font-base bg-primary text-white py-2 px-4 rounded-2 d-inline-block">{{$course->category->title}}</h6>
                    <!-- Title -->
                    <h1 class="fs-3">{{$course->title}}</h1>
                    <p>در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان
                        رسد وزمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی
                        اساسا مورد استفاده قرار گیرد.</p>
                    <!-- Content -->
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item me-3 mb-1 mb-sm-0"><i class="fas fa-star text-warning me-2"></i>4.5/5.0
                        </li>
                        <li class="list-inline-item me-3 mb-1 mb-sm-0"><i
                                class="fas fa-user-graduate text-orange me-2"></i>12 شرکت کننده
                        </li>
                        <li class="list-inline-item me-3 mb-1 mb-sm-0"><i class="fas fa-signal text-success me-2"></i>{{$course->level}}
                        </li>
                        <li class="list-inline-item me-3 mb-1 mb-sm-0"><i
                                class="bi bi-patch-exclamation-fill text-danger me-2"></i> آخرین بروزرسانی {{\Hekmatinasser\Verta\Verta::instance($course->lessons()->latest()->first()->updated_at)->formatJalaliDate()}}
                        </li>
                        <li class="list-inline-item mb-0"><i class="fas fa-globe text-info me-2"></i>انگلیسی</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- =======================
    Page intro END -->

    <!-- =======================
    Page content START -->
    <section class="pb-0 py-lg-5">
        <div class="container">
            <div class="row">
                <!-- Main content START -->
                <div class="col-lg-8">
                    <div class="card shadow rounded-2 p-0">
                        <!-- Tabs START -->
                        <div class="card-header border-bottom px-4 py-3">
                            <ul class="nav nav-pills nav-tabs-line py-0" id="course-pills-tab" role="tablist">
                                <!-- Tab item -->
                                <li class="nav-item me-2 me-sm-4" role="presentation">
                                    <button class="nav-link mb-2 mb-md-0 active" id="course-pills-tab-1"
                                            data-bs-toggle="pill" data-bs-target="#course-pills-1" type="button"
                                            role="tab" aria-controls="course-pills-1" aria-selected="true">توضیحات
                                    </button>
                                </li>
                                <!-- Tab item -->
                                <li class="nav-item me-2 me-sm-4" role="presentation">
                                    <button class="nav-link mb-2 mb-md-0" id="course-pills-tab-2" data-bs-toggle="pill"
                                            data-bs-target="#course-pills-2" type="button" role="tab"
                                            aria-controls="course-pills-2" aria-selected="false">جلسات دوره
                                    </button>
                                </li>
                                <!-- Tab item -->
                                <li class="nav-item me-2 me-sm-4" role="presentation">
                                    <button class="nav-link mb-2 mb-md-0" id="course-pills-tab-3" data-bs-toggle="pill"
                                            data-bs-target="#course-pills-3" type="button" role="tab"
                                            aria-controls="course-pills-3" aria-selected="false">مدرس
                                    </button>
                                </li>
                                <!-- Tab item -->
                                <li class="nav-item me-2 me-sm-4" role="presentation">
                                    <button class="nav-link mb-2 mb-md-0" id="course-pills-tab-4" data-bs-toggle="pill"
                                            data-bs-target="#course-pills-4" type="button" role="tab"
                                            aria-controls="course-pills-4" aria-selected="false">دیدگاه
                                    </button>
                                </li>
                                <!-- Tab item -->
                                <li class="nav-item me-2 me-sm-4" role="presentation">
                                    <button class="nav-link mb-2 mb-md-0" id="course-pills-tab-5" data-bs-toggle="pill"
                                            data-bs-target="#course-pills-5" type="button" role="tab"
                                            aria-controls="course-pills-5" aria-selected="false">سوالات متداول
                                    </button>
                                </li>
                                <!-- Tab item -->
                                <li class="nav-item me-2 me-sm-4" role="presentation">
                                    <button class="nav-link mb-2 mb-md-0" id="course-pills-tab-6" data-bs-toggle="pill"
                                            data-bs-target="#course-pills-6" type="button" role="tab"
                                            aria-controls="course-pills-6" aria-selected="false">پرسش و پاسخ
                                    </button>
                                </li>
                            </ul>
                        </div>
                        <!-- Tabs END -->

                        <!-- Tab contents START -->
                        <div class="card-body p-4">
                            <div class="tab-content pt-2" id="course-pills-tabContent">
                                <!-- Content START -->
                                <div class="tab-pane fade show active" id="course-pills-1" role="tabpanel"
                                     aria-labelledby="course-pills-tab-1">
                                    <!-- Course detail START -->
                                    <h5 class="mb-3">توضیحات این دوره</h5>
                                    {!! $course->description !!}                                    <!-- Course detail END -->

                                </div>
                                <!-- Content END -->

                                <!-- Content START -->
                                <div class="tab-pane fade" id="course-pills-2" role="tabpanel"
                                     aria-labelledby="course-pills-tab-2">
                                    <!-- Course accordion START -->
                                    <div class="accordion accordion-icon accordion-bg-light" id="accordionExample2">
                                        @foreach($course->seasons as $season)
                                            <!-- Item -->
                                            <div class="accordion-item mb-3">
                                                <h6 class="accordion-header font-base" id="heading-1">
                                                    <button
                                                        class="accordion-button fw-bold rounded d-sm-flex d-inline-block collapsed"
                                                        type="button" data-bs-toggle="collapse" data-bs-target="#collapse-1"
                                                        aria-expanded="true" aria-controls="collapse-1">
                                                        {{$season->title}}
                                                        <span class="small ms-0 ms-sm-2">(3 ویدیو)</span>
                                                    </button>
                                                </h6>
                                                <div id="collapse-1" class="accordion-collapse collapse show"
                                                     aria-labelledby="heading-1" data-bs-parent="#accordionExample2">
                                                    <div class="accordion-body mt-3">
                                                        @foreach($season->lessons as $lesson)
                                                            <!-- Course lecture -->
                                                            <div class="d-flex justify-content-between align-items-center">
                                                                <div class="position-relative d-flex align-items-center">
                                                                    <a href="#"
                                                                       class="btn btn-danger-soft btn-round btn-sm mb-0 stretched-link position-static">
                                                                        <i class="fas fa-play me-0"></i>
                                                                    </a>
                                                                    <span
                                                                        class="d-inline-block text-truncate ms-2 mb-0 h6 fw-light w-100px w-sm-200px w-md-400px">{{$lesson->title}}</span>
                                                                </div>
{{--                                                            Fw--}}
                                                            </div>

                                                            <hr> <!-- Divider -->
                                                        @endforeach


                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach


                                    </div>
                                    <!-- Course accordion END -->
                                </div>
                                <!-- Content END -->

                                <!-- Content START -->
                                <div class="tab-pane fade" id="course-pills-3" role="tabpanel"
                                     aria-labelledby="course-pills-tab-3">
                                    <!-- Card START -->
                                    <div class="card mb-0 mb-md-4">
                                        <div class="row g-0 align-items-center">
                                            <div class="col-md-5">
                                                <!-- Image -->
                                                <img src="{{url('assets/images/instructor/01.jpg')}}" class="img-fluid rounded-3"
                                                     alt="instructor-image">
                                            </div>
                                            <div class="col-md-7">
                                                <!-- Card body -->
                                                <div class="card-body">
                                                    <!-- Title -->
                                                    <h3 class="card-title mb-0 fs-5">{{$course->user->name}}</h3>
                                                    <p class="mb-2"></p>
                                                    <!-- Social button -->
                                                    <ul class="list-inline mb-3">
                                                        <li class="list-inline-item me-3">
                                                            <a href="#" class="fs-5 text-twitter"><i
                                                                    class="fab fa-twitter-square"></i></a>
                                                        </li>
                                                        <li class="list-inline-item me-3">
                                                            <a href="#" class="fs-5 text-instagram"><i
                                                                    class="fab fa-instagram-square"></i></a>
                                                        </li>
                                                        <li class="list-inline-item me-3">
                                                            <a href="#" class="fs-5 text-facebook"><i
                                                                    class="fab fa-facebook-square"></i></a>
                                                        </li>
                                                        <li class="list-inline-item me-3">
                                                            <a href="#" class="fs-5 text-linkedin"><i
                                                                    class="fab fa-linkedin"></i></a>
                                                        </li>
                                                        <li class="list-inline-item">
                                                            <a href="#" class="fs-5 text-youtube"><i
                                                                    class="fab fa-youtube-square"></i></a>
                                                        </li>
                                                    </ul>

                                                    <!-- Info -->
                                                    <ul class="list-inline">
                                                        <li class="list-inline-item">
                                                            <div class="d-flex align-items-center me-3 mb-2">
                                                                <span
                                                                    class="icon-md bg-orange bg-opacity-10 text-orange rounded-circle"><i
                                                                        class="fas fa-user-graduate"></i></span>
                                                                <span class="h6 fw-light mb-0 ms-2">9.1k</span>
                                                            </div>
                                                        </li>
                                                        <li class="list-inline-item">
                                                            <div class="d-flex align-items-center me-3 mb-2">
                                                                <span
                                                                    class="icon-md bg-warning bg-opacity-15 text-warning rounded-circle"><i
                                                                        class="fas fa-star"></i></span>
                                                                <span class="h6 fw-light mb-0 ms-2">4.5</span>
                                                            </div>
                                                        </li>
                                                        <li class="list-inline-item">
                                                            <div class="d-flex align-items-center me-3 mb-2">
                                                                <span
                                                                    class="icon-md bg-danger bg-opacity-10 text-danger rounded-circle"><i
                                                                        class="fas fa-play"></i></span>
                                                                <span
                                                                    class="h6 fw-light mb-0 ms-2">29 دوره آموزشی</span>
                                                            </div>
                                                        </li>
                                                        <li class="list-inline-item">
                                                            <div class="d-flex align-items-center me-3 mb-2">
                                                                <span
                                                                    class="icon-md bg-info bg-opacity-10 text-info rounded-circle"><i
                                                                        class="fas fa-comment-dots"></i></span>
                                                                <span class="h6 fw-light mb-0 ms-2">205</span>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Card END -->

                                    <!-- Instructor info -->
                                    <h5 class="mb-3">درباره مدرس</h5>
                                    <p class="mb-3">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با
                                        استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و
                                        سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با
                                        هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و
                                        آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را
                                        برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد
                                        کرد. </p>
                                    <p class="mb-3">در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه
                                        راهکارها و شرایط سخت تایپ به پایان رسد وزمان مورد نیاز شامل حروفچینی دستاوردهای
                                        اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار
                                        گیرد.</p>
                                    <!-- Email address -->
                                    <div class="col-12">
                                        <ul class="list-group list-group-borderless mb-0">
                                            <li class="list-group-item pb-0">ایمیل: <a href="#" class="ms-2">example@email.com</a>
                                            </li>
                                            <li class="list-group-item pb-0">وب سایت: <a href="#" class="ms-2">https://example.com</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- Content END -->

                                <!-- Content START -->
                                <div  class="tab-pane fade" id="course-pills-4" role="tabpanel"
                                     aria-labelledby="course-pills-tab-4">
                                    <!-- Review START -->
                                    <div class="row mb-4">
                                        <h5 class="mb-4">دیدگاه کاربران</h5>

                                        <!-- Rating info -->
                                        <div class="col-md-4 mb-3 mb-md-0">
                                            <div class="text-center">
                                                <!-- Info -->
                                                <h2 class="mb-0">{{$this->comments()->avg('stars')}}</h2>
                                                <!-- Star -->
                                                <ul class="list-inline mb-0">
                                                    <li class="list-inline-item me-0"><i
                                                            class="fas fa-star text-warning"></i></li>
                                                    <li class="list-inline-item me-0"><i
                                                            class="fas fa-star text-warning"></i></li>
                                                    <li class="list-inline-item me-0"><i
                                                            class="fas fa-star text-warning"></i></li>
                                                    <li class="list-inline-item me-0"><i
                                                            class="fas fa-star text-warning"></i></li>
                                                    <li class="list-inline-item me-0"><i
                                                            class="fas fa-star-half-alt text-warning"></i></li>
                                                </ul>
                                                <p class="mb-0">(بر اساس بررسی امروز)</p>
                                            </div>
                                        </div>

                                        <!-- Progress-bar and star -->
                                        <div class="col-md-8">
                                            <div class="row align-items-center">
                                                <!-- Progress bar and Rating -->
                                                <div class="col-6 col-sm-8">
                                                    <!-- Progress item -->
                                                    <div class="progress progress-sm bg-warning bg-opacity-15">
                                                        <div class="progress-bar bg-warning" role="progressbar"
                                                             style="width: 100%" aria-valuenow="100" aria-valuemin="0"
                                                             aria-valuemax="100"></div>
                                                    </div>
                                                </div>

                                                <div class="col-6 col-sm-4">
                                                    <!-- Star item -->
                                                    <ul class="list-inline mb-0">
                                                        <li class="list-inline-item me-0 small"><i
                                                                class="fas fa-star text-warning"></i></li>
                                                        <li class="list-inline-item me-0 small"><i
                                                                class="fas fa-star text-warning"></i></li>
                                                        <li class="list-inline-item me-0 small"><i
                                                                class="fas fa-star text-warning"></i></li>
                                                        <li class="list-inline-item me-0 small"><i
                                                                class="fas fa-star text-warning"></i></li>
                                                        <li class="list-inline-item me-0 small"><i
                                                                class="fas fa-star text-warning"></i></li>
                                                    </ul>
                                                </div>

                                                <!-- Progress bar and Rating -->
                                                <div class="col-6 col-sm-8">
                                                    <!-- Progress item -->
                                                    <div class="progress progress-sm bg-warning bg-opacity-15">
                                                        <div class="progress-bar bg-warning" role="progressbar"
                                                             style="width: 80%" aria-valuenow="80" aria-valuemin="0"
                                                             aria-valuemax="100"></div>
                                                    </div>
                                                </div>

                                                <div class="col-6 col-sm-4">
                                                    <!-- Star item -->
                                                    <ul class="list-inline mb-0">
                                                        <li class="list-inline-item me-0 small"><i
                                                                class="fas fa-star text-warning"></i></li>
                                                        <li class="list-inline-item me-0 small"><i
                                                                class="fas fa-star text-warning"></i></li>
                                                        <li class="list-inline-item me-0 small"><i
                                                                class="fas fa-star text-warning"></i></li>
                                                        <li class="list-inline-item me-0 small"><i
                                                                class="fas fa-star text-warning"></i></li>
                                                        <li class="list-inline-item me-0 small"><i
                                                                class="far fa-star text-warning"></i></li>
                                                    </ul>
                                                </div>

                                                <!-- Progress bar and Rating -->
                                                <div class="col-6 col-sm-8">
                                                    <!-- Progress item -->
                                                    <div class="progress progress-sm bg-warning bg-opacity-15">
                                                        <div class="progress-bar bg-warning" role="progressbar"
                                                             style="width: 60%" aria-valuenow="60" aria-valuemin="0"
                                                             aria-valuemax="100"></div>
                                                    </div>
                                                </div>

                                                <div class="col-6 col-sm-4">
                                                    <!-- Star item -->
                                                    <ul class="list-inline mb-0">
                                                        <li class="list-inline-item me-0 small"><i
                                                                class="fas fa-star text-warning"></i></li>
                                                        <li class="list-inline-item me-0 small"><i
                                                                class="fas fa-star text-warning"></i></li>
                                                        <li class="list-inline-item me-0 small"><i
                                                                class="fas fa-star text-warning"></i></li>
                                                        <li class="list-inline-item me-0 small"><i
                                                                class="far fa-star text-warning"></i></li>
                                                        <li class="list-inline-item me-0 small"><i
                                                                class="far fa-star text-warning"></i></li>
                                                    </ul>
                                                </div>

                                                <!-- Progress bar and Rating -->
                                                <div class="col-6 col-sm-8">
                                                    <!-- Progress item -->
                                                    <div class="progress progress-sm bg-warning bg-opacity-15">
                                                        <div class="progress-bar bg-warning" role="progressbar"
                                                             style="width: 40%" aria-valuenow="40" aria-valuemin="0"
                                                             aria-valuemax="100"></div>
                                                    </div>
                                                </div>

                                                <div class="col-6 col-sm-4">
                                                    <!-- Star item -->
                                                    <ul class="list-inline mb-0">
                                                        <li class="list-inline-item me-0 small"><i
                                                                class="fas fa-star text-warning"></i></li>
                                                        <li class="list-inline-item me-0 small"><i
                                                                class="fas fa-star text-warning"></i></li>
                                                        <li class="list-inline-item me-0 small"><i
                                                                class="far fa-star text-warning"></i></li>
                                                        <li class="list-inline-item me-0 small"><i
                                                                class="far fa-star text-warning"></i></li>
                                                        <li class="list-inline-item me-0 small"><i
                                                                class="far fa-star text-warning"></i></li>
                                                    </ul>
                                                </div>

                                                <!-- Progress bar and Rating -->
                                                <div class="col-6 col-sm-8">
                                                    <!-- Progress item -->
                                                    <div class="progress progress-sm bg-warning bg-opacity-15">
                                                        <div class="progress-bar bg-warning" role="progressbar"
                                                             style="width: 20%" aria-valuenow="20" aria-valuemin="0"
                                                             aria-valuemax="100"></div>
                                                    </div>
                                                </div>

                                                <div class="col-6 col-sm-4">
                                                    <!-- Star item -->
                                                    <ul class="list-inline mb-0">
                                                        <li class="list-inline-item me-0 small"><i
                                                                class="fas fa-star text-warning"></i></li>
                                                        <li class="list-inline-item me-0 small"><i
                                                                class="far fa-star text-warning"></i></li>
                                                        <li class="list-inline-item me-0 small"><i
                                                                class="far fa-star text-warning"></i></li>
                                                        <li class="list-inline-item me-0 small"><i
                                                                class="far fa-star text-warning"></i></li>
                                                        <li class="list-inline-item me-0 small"><i
                                                                class="far fa-star text-warning"></i></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Review END -->
                                    <hr>
                                    <!-- Student review START -->
                                    <div class="row">
                                        <!-- Review item START -->
                                        @foreach($this->comments as $comment)
                                            <div  class="d-md-flex my-4">
                                                <!-- Avatar -->
                                                <div class="avatar avatar-xl me-4 flex-shrink-0">
                                                    <img class="avatar-img rounded-circle" src="{{url('assets/images/avatar/09.jpg')}}"
                                                         alt="avatar">
                                                </div>
                                                <!-- Text -->
                                                <div>
                                                    <div class="d-sm-flex mt-1 mt-md-0 align-items-center">
                                                        <h5 class="me-3 mb-0 fw-normal">{{$comment->user->name}}</h5>
                                                        <!-- Review star -->
                                                        <ul class="list-inline mb-0">
                                                            @for($i=0; $i< $comment->stars; $i++)
                                                                <li class="list-inline-item me-0"><i
                                                                        class="fas fa-star text-warning"></i></li>
                                                            @endfor
                                                            @for($i=0; $i< 5- $comment->stars; $i++)
                                                                <li class="list-inline-item me-0"><i
                                                                        class="far fa-star text-warning"></i></li>
                                                            @endfor
                                                        </ul>
                                                    </div>
                                                    <!-- Info -->
                                                    <p class="small mb-2">{{\Hekmatinasser\Verta\Verta::instance($comment->created_at)->formatDifference()}}</p>
                                                    <p class="mb-2">{{$comment->text}}</p>
                                                    <!-- Like and dislike button -->
                                                    @auth
                                                        <div  class="btn-group" role="group"
                                                             aria-label="Basic radio toggle button group">
                                                            <!-- Like button -->
                                                            <input @if($comment->userVote?->type == \Modules\Comments\app\Enums\CommentVoteType::Like->value) checked @endif type="radio" class="btn-check" name="btnradio{{$comment->id}}"
                                                                   id="btnradio{{$comment->id}}">
                                                            <label wire:click.prevent="likeComment({{$comment->id}})" class="btn btn-outline-light btn-sm mb-0" for="btnradio{{$comment->id}}"><i
                                                                    class="far fa-thumbs-up me-1"></i>{{$comment->likes}}</label>
                                                            <!-- Dislike button -->

                                                            <input @if($comment->userVote?->type == \Modules\Comments\app\Enums\CommentVoteType::Dislike->value) checked @endif type="radio" class="btn-check" name="btnradio{{$comment->id}}"
                                                                   id="btnradio{{$comment->id}}">
                                                            <label wire:click.prevent="dislikeComment({{$comment->id}})" class="btn btn-outline-light btn-sm mb-0" for="btnradio{{$comment->id}}"> <i
                                                                    class="far fa-thumbs-down me-1"></i>{{$comment->dislikes}}</label>
                                                        </div>
                                                    @endauth
                                                </div>
                                            </div>
                                            <hr>
                                        @endforeach

                                    </div>
                                    <!-- Student review END -->

                                    @auth
                                        @if(session()->has('message'))
                                            <p class="alert alert-success">{{session('message')}}</p>
                                        @endif
                                        <!-- Leave Review START -->
                                        <div class="mt-2">
                                            <h5 class="mb-4">ثبت دیدگاه</h5>
                                            <form class="row g-3">
                                                <!-- Rating -->
                                                <div class="col-12 bg-light-input">
                                                    <select wire:model="stars" id="inputState2" class="form-select js-choice">
                                                        <option>انتخاب کنید</option>
                                                        <option value="5">★★★★★ (5/5)</option>
                                                        <option value="4">★★★★☆ (4/5)</option>
                                                        <option value="3">★★★☆☆ (3/5)</option>
                                                        <option value="2">★★☆☆☆ (2/5)</option>
                                                        <option value="1">★☆☆☆☆ (1/5)</option>
                                                    </select>
                                                    @error('stars')
                                                    <p class="alert alert-danger">{{$message}}</p>
                                                    @enderror
                                                </div>
                                                <!-- Message -->
                                                <div class="col-12 bg-light-input">
                                                <textarea wire:model="text" class="form-control" id="exampleFormControlTextarea1"
                                                          placeholder="دیدگاه خود را بنویسید" rows="3"></textarea>
                                                    @error('text')
                                                    <p class="alert alert-danger">{{$message}}</p>
                                                    @enderror
                                                </div>
                                                <!-- Button -->
                                                <div class="col-12">
                                                    <button wire:click.prevent="saveComment" type="button" class="btn btn-primary mb-0">ثبت دیدگاه</button>
                                                </div>
                                            </form>
                                        </div>
                                        <!-- Leave Review END -->
                                    @endauth
                                    @guest
                                        <h3>برای ثبت نظر باید به سایت وارد شوید</h3>
                                    @endguest

                                </div>
                                <!-- Content END -->

                                <!-- Content START -->
                                <div class="tab-pane fade" id="course-pills-5" role="tabpanel"
                                     aria-labelledby="course-pills-tab-5">
                                    <!-- Title -->
                                    <h5 class="mb-3">سوالات متداول</h5>
                                    <!-- Accordion START -->
                                    <div class="accordion accordion-flush" id="accordionExample">
                                        <!-- Item -->
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="headingOne">
                                                <button class="accordion-button collapsed" type="button"
                                                        data-bs-toggle="collapse" data-bs-target="#collapseOne"
                                                        aria-expanded="true" aria-controls="collapseOne">
                                                    <span class="text-secondary fw-bold me-3">01</span>
                                                    <span class="h6 mb-0">بازاریابی دیجیتال چگونه کار می کند؟</span>
                                                </button>
                                            </h2>
                                            <div id="collapseOne" class="accordion-collapse collapse show"
                                                 aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                                <div class="accordion-body pt-0">
                                                    برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود
                                                    ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال
                                                    و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها
                                                    شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و
                                                    فرهنگ پیشرو در زبان فارسی ایجاد کرد.
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Item -->
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="headingTwo">
                                                <button class="accordion-button collapsed" type="button"
                                                        data-bs-toggle="collapse" data-bs-target="#collapseTwo"
                                                        aria-expanded="false" aria-controls="collapseTwo">
                                                    <span class="text-secondary fw-bold me-3">02</span>
                                                    <span class="h6 mb-0">SEO چیست؟</span>
                                                </button>
                                            </h2>
                                            <div id="collapseTwo" class="accordion-collapse collapse"
                                                 aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                                <div class="accordion-body pt-0">
                                                    در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه
                                                    راهکارها و شرایط سخت تایپ به پایان رسد وزمان مورد نیاز شامل حروفچینی
                                                    دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا
                                                    مورد استفاده قرار گیرد.
                                                    <p class="mt-2">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از
                                                        صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه
                                                        روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی
                                                        تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای
                                                        کاربردی می باشد.</p>
                                                    کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه
                                                    و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان
                                                    رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد
                                                    کرد. در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه
                                                    راهکارها و شرایط سخت تایپ به پایان رسد وزمان مورد نیاز شامل حروفچینی
                                                    دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا
                                                    مورد استفاده قرار گیرد.
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Item -->
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="headingThree">
                                                <button class="accordion-button collapsed" type="button"
                                                        data-bs-toggle="collapse" data-bs-target="#collapseThree"
                                                        aria-expanded="false" aria-controls="collapseThree">
                                                    <span class="text-secondary fw-bold me-3">03</span>
                                                    <span class="h6 mb-0">چه کسانی باید در این دوره شرکت کنند؟</span>
                                                </button>
                                            </h2>
                                            <div id="collapseThree" class="accordion-collapse collapse"
                                                 aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                                <div class="accordion-body pt-0">
                                                    لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با
                                                    استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در
                                                    ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و
                                                    کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی
                                                    <strong>در شصت و سه درصد گذشته،</strong> حال و آینده شناخت فراوان
                                                    جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای
                                                    طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی
                                                    ایجاد کرد.
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Item -->
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="headingFour">
                                                <button class="accordion-button collapsed" type="button"
                                                        data-bs-toggle="collapse" data-bs-target="#collapseFour"
                                                        aria-expanded="false" aria-controls="collapseFour">
                                                    <span class="text-secondary fw-bold me-3">04</span>
                                                    <span class="h6 mb-0">T&C برای این برنامه چیست؟</span>
                                                </button>
                                            </h2>
                                            <div id="collapseFour" class="accordion-collapse collapse"
                                                 aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                                                <div class="accordion-body pt-0">
                                                    لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با
                                                    استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در
                                                    ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و
                                                    کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی
                                                    در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را
                                                    می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی
                                                    الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد. در این
                                                    صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها و
                                                    شرایط سخت تایپ به پایان رسد وزمان مورد نیاز شامل حروفچینی دستاوردهای
                                                    اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد
                                                    استفاده قرار گیرد.
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Item -->
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="headingFive">
                                                <button class="accordion-button collapsed" type="button"
                                                        data-bs-toggle="collapse" data-bs-target="#collapseFive"
                                                        aria-expanded="false" aria-controls="collapseFive">
                                                    <span class="text-secondary fw-bold me-3">05</span>
                                                    <span class="h6 mb-0">چه گواهی هایی برای این برنامه دریافت خواهم کرد؟</span>
                                                </button>
                                            </h2>
                                            <div id="collapseFive" class="accordion-collapse collapse"
                                                 aria-labelledby="headingFive" data-bs-parent="#accordionExample">
                                                <div class="accordion-body pt-0">
                                                    چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و
                                                    برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود
                                                    ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال
                                                    و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها
                                                    شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و
                                                    فرهنگ پیشرو در زبان فارسی ایجاد کرد. در این صورت می توان امید داشت
                                                    که تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان
                                                    رسد وزمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات
                                                    پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Accordion END -->
                                </div>
                                <!-- Content END -->

                                <!-- Content START -->
                                <div class="tab-pane fade" id="course-pills-6" role="tabpanel"
                                     aria-labelledby="course-pills-tab-6">
                                    <!-- Review START -->
                                    <div class="row">
                                        <div class="col-12">
                                            <h5 class="mb-4">پرسش و پاسخ</h5>

                                            <!-- Comment box -->
                                            <div class="d-flex mb-4">
                                                <!-- Avatar -->
                                                <div class="avatar avatar-sm flex-shrink-0 me-2">
                                                    <a href="#"> <img class="avatar-img rounded-circle"
                                                                      src="assets/images/avatar/09.jpg" alt=""> </a>
                                                </div>

                                                <form class="w-100 d-flex">
                                                    <textarea class="one form-control pe-4 bg-light"
                                                              id="autoheighttextarea" rows="1"
                                                              placeholder="افزودن پرسش ..."></textarea>
                                                    <button class="btn btn-primary ms-2 mb-0" type="button">ارسال
                                                    </button>
                                                </form>
                                            </div>

                                            <!-- Comment item START -->
                                            <div class="border p-2 p-sm-4 rounded-3 mb-4">
                                                <ul class="list-unstyled mb-0">
                                                    <li class="comment-item">
                                                        <div class="d-flex mb-3">
                                                            <!-- Avatar -->
                                                            <div class="avatar avatar-sm flex-shrink-0">
                                                                <a href="#"><img class="avatar-img rounded-circle"
                                                                                 src="assets/images/avatar/05.jpg"
                                                                                 alt=""></a>
                                                            </div>
                                                            <div class="ms-2">
                                                                <!-- Comment by -->
                                                                <div class="bg-light p-3 rounded">
                                                                    <div class="d-flex justify-content-center">
                                                                        <div class="me-2">
                                                                            <h6 class="mb-1 fw-normal"><a href="#!">
                                                                                    مهناز احمدی </a></h6>
                                                                            <p class="mb-0">آیا این آموزش جامع است و می
                                                                                شود با آن سایت مدیریت یا فروشگاهی زد؟
                                                                                (موارپلود تصویر و...)</p>
                                                                        </div>
                                                                        <small>5دقیقه</small>
                                                                    </div>
                                                                </div>
                                                                <!-- Comment react -->
                                                                <ul class="nav nav-divider py-2 small">
                                                                    <li class="nav-item"><a class="text-primary-hover"
                                                                                            href="#"> لایک (3)</a></li>
                                                                    <li class="nav-item"><a class="text-primary-hover"
                                                                                            href="#"> پاسخ</a></li>
                                                                    <li class="nav-item"><a class="text-primary-hover"
                                                                                            href="#"> مشاهده 5 پاسخ</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>

                                                        <!-- Comment item nested START -->
                                                        <ul class="list-unstyled ms-4">
                                                            <!-- Comment item START -->
                                                            <li class="comment-item">
                                                                <div class="d-flex">
                                                                    <!-- Avatar -->
                                                                    <div class="avatar avatar-xs flex-shrink-0">
                                                                        <a href="#"><img
                                                                                class="avatar-img rounded-circle"
                                                                                src="assets/images/avatar/06.jpg"
                                                                                alt=""></a>
                                                                    </div>
                                                                    <!-- Comment by -->
                                                                    <div class="ms-2">
                                                                        <div class="bg-light p-3 rounded">
                                                                            <div class="d-flex justify-content-center">
                                                                                <div class="me-2">
                                                                                    <h6 class="mb-1 fw-normal"><a
                                                                                            href="#"> زهرا مختاری </a>
                                                                                    </h6>
                                                                                    <p class=" mb-0">چاپگرها و متون بلکه
                                                                                        روزنامه و مجله در ستون و
                                                                                        سطرآنچنان که لازم است و برای
                                                                                        شرایط فعلی تکنولوژی مورد نیاز و
                                                                                        کاربردهای متنوع با هدف بهبود
                                                                                        ابزارهای کاربردی می باشد.</p>
                                                                                </div>
                                                                                <small>2دقیقه</small>
                                                                            </div>
                                                                        </div>
                                                                        <!-- Comment react -->
                                                                        <ul class="nav nav-divider py-2 small">
                                                                            <li class="nav-item"><a
                                                                                    class="text-primary-hover"
                                                                                    href="#!"> لایک (5)</a></li>
                                                                            <li class="nav-item"><a
                                                                                    class="text-primary-hover"
                                                                                    href="#!"> پاسخ</a></li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <!-- Comment item END -->
                                                        </ul>
                                                        <!-- Comment item nested END -->
                                                    </li>
                                                </ul>
                                            </div>
                                            <!-- Comment item END -->

                                            <!-- Comment item START -->
                                            <div class="border p-2 p-sm-4 rounded-3">
                                                <ul class="list-unstyled mb-0">
                                                    <li class="comment-item">
                                                        <div class="d-flex">
                                                            <!-- Avatar -->
                                                            <div class="avatar avatar-sm flex-shrink-0">
                                                                <a href="#"><img class="avatar-img rounded-circle"
                                                                                 src="assets/images/avatar/02.jpg"
                                                                                 alt=""></a>
                                                            </div>
                                                            <div class="ms-2">
                                                                <!-- Comment by -->
                                                                <div class="bg-light p-3 rounded">
                                                                    <div class="d-flex justify-content-center">
                                                                        <div class="me-2">
                                                                            <h6 class="mb-1 fw-normal"><a href="#!">
                                                                                    محمد علیزاده </a></h6>
                                                                            <p class="mb-0">در vuejs این فایل ها در حالت
                                                                                عادی اجرا می شوند یا احتیاج به تنظیمات
                                                                                خاص دارد، اگر دارد در دوره آموزش
                                                                                دادید؟</p>
                                                                        </div>
                                                                        <small>5دقیقه</small>
                                                                    </div>
                                                                </div>
                                                                <!-- Comment react -->
                                                                <ul class="nav nav-divider py-2 small">
                                                                    <li class="nav-item"><a class="text-primary-hover"
                                                                                            href="#"> لایک</a></li>
                                                                    <li class="nav-item"><a class="text-primary-hover"
                                                                                            href="#"> پاسخ</a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <!-- Comment item END -->

                                        </div>

                                    </div>
                                </div>
                                <!-- Content END -->

                            </div>
                        </div>
                        <!-- Tab contents END -->
                    </div>
                </div>
                <!-- Main content END -->

                <!-- Right sidebar START -->
                <div class="col-lg-4 pt-5 pt-lg-0">
                    <div class="row mb-5 mb-lg-0">
                        <div class="col-md-6 col-lg-12">
                            <!-- Video START -->
                            <div class="card shadow p-2 mb-4 z-index-9">
                                <div class=" overflow-hidden rounded-3">
                                    <div class="m-auto w-100">
                                        <video poster="{{url('images/courses/'.$course->id.'/'. $course->image)}}" class="video-js w-100" controls preload="auto" data-setup="{}" height="200">
                                            <source  src="{{url('videos/courses/'. $course->id .'/intro/'. $course->video)}}" type="video/mp4">
                                        </video>
                                    </div>
                                </div>

                                <!-- Card body -->
                                <div class="card-body px-3">
                                    <!-- Info -->
                                    <div class="d-flex justify-content-between align-items-center">
                                        <!-- Price and time -->
                                        <div>
                                            <div class="d-flex align-items-center">
                                                <h3 class="fw-bold mb-0 fs-5 me-2">
                                                    {{ $course->price - (($course->price * $course->discount ) / 100) }}
                                                    تومان</h3>
                                                <span class="text-decoration-line-through mb-0 me-2">{{$course->price}}</span>
                                                <span class="badge text-bg-orange mb-0">{{$course->discount}}% تخفیف</span>
                                            </div>
                                            {{--                                            <p class="mb-0 text-danger"><i class="fas fa-stopwatch me-2"></i>5 روز باقی--}}
                                            {{--                                                مانده</p>--}}
                                        </div>

                                        <!-- Share button with dropdown -->
                                        <div class="dropdown">
                                            <!-- Share button -->
                                            <a href="#" class="btn btn-sm btn-light rounded small" role="button"
                                               id="dropdownShare" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="fas fa-fw fa-share-alt"></i>
                                            </a>
                                            <!-- dropdown button -->
                                            <ul class="dropdown-menu dropdown-w-sm dropdown-menu-end min-w-auto shadow rounded"
                                                aria-labelledby="dropdownShare">
                                                <li><a class="dropdown-item" href="#"><i
                                                            class="fab fa-twitter-square me-2"></i>Twitter</a></li>
                                                <li><a class="dropdown-item" href="#"><i
                                                            class="fab fa-facebook-square me-2"></i>Facebook</a></li>
                                                <li><a class="dropdown-item" href="#"><i
                                                            class="fab fa-linkedin me-2"></i>LinkedIn</a></li>
                                                <li><a class="dropdown-item" href="#"><i class="fas fa-copy me-2"></i>کپی
                                                        لینک</a></li>
                                            </ul>
                                        </div>
                                    </div>

                                    <!-- Buttons -->
                                    <div class="mt-3 d-sm-flex justify-content-sm-between">
                                        @auth
                                            <a href="#" wire:click="buyCourse" class="btn btn-success mb-0">خرید دوره</a>
                                        @endauth
                                        @guest
                                            <a href="{{route('login')}}" class="btn btn-outline-primary mb-0">برای خرید دوره لطفا وارد شوید</a>
                                        @endguest
                                    </div>
                                </div>
                            </div>
                            <!-- Video END -->

                            <!-- Course info START -->
                            <div class="card card-body shadow p-4 mb-4">
                                <!-- Title -->
                                <h4 class="mb-3 fs-5">مشخصات دوره</h4>
                                <ul class="list-group list-group-borderless">
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <span class="h6 fw-light mb-0"><i
                                                class="fas fa-fw fa-book-open text-primary"></i>تعداد ویدیو ها</span>
                                        <span>{{count($course->lessons)}}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <span class="h6 fw-light mb-0"><i class="fas fa-fw fa-clock text-primary"></i>مدت زمان دوره</span>
                                        <span>4ساعت</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <span class="h6 fw-light mb-0"><i class="fas fa-fw fa-signal text-primary"></i>سطح دوره</span>
                                        <span>{{$course->courseLevelTranslator($course->level)}}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <span class="h6 fw-light mb-0"><i class="fas fa-fw fa-globe text-primary"></i>زبان</span>
                                        <span>انگلیسی</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <span class="h6 fw-light mb-0"><i
                                                class="fas fa-fw fa-user-clock text-primary"></i>تاریخ بروزرسانی</span>
                                        <span>30 تیر 1400</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <span class="h6 fw-light mb-0"><i class="fas fa-fw fa-medal text-primary"></i>مدرک</span>
                                        <span>دارد</span>
                                    </li>
                                </ul>
                            </div>
                            <!-- Course info END -->
                        </div>

                        <div class="col-md-6 col-lg-12">
                            <!-- Recently Viewed START -->
                            <div class="card card-body shadow p-4 mb-4">
                                <!-- Title -->
                                <h4 class="mb-3 fs-5">آخرین دوره ها</h4>
                                <!-- Course item START -->
                                <div class="row gx-3 mb-3">
                                    <!-- Image -->
                                    <div class="col-4">
                                        <img class="rounded" src="{{url('assets/images/courses/4by3/21.jpg')}}" alt="">
                                    </div>
                                    <!-- Info -->
                                    <div class="col-8">
                                        <h6 class="mb-0 fw-normal"><a href="#">آموزش مقدماتی کتابخانه Pygame</a></h6>
                                        <ul class="list-group list-group-borderless mt-1 d-flex justify-content-between">
                                            <li class="list-group-item px-0 d-flex justify-content-between">
                                                <span class="text-success">100,000 تومان</span>
                                                <span class="h6 fw-light">4.5<i
                                                        class="fas fa-star text-warning ms-1"></i></span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- Course item END -->

                                <!-- Course item START -->
                                <div class="row gx-3">
                                    <!-- Image -->
                                    <div class="col-4">
                                        <img class="rounded" src="{{url('assets/images/courses/4by3/18.jpg')}}" alt="">
                                    </div>
                                    <!-- Info -->
                                    <div class="col-8">
                                        <h6 class="mb-0 fw-normal"><a href="#">دوره آموزش جامع Vue Js</a></h6>
                                        <ul class="list-group list-group-borderless mt-1 d-flex justify-content-between">
                                            <li class="list-group-item px-0 d-flex justify-content-between">
                                                <span class="text-success">70,000 تومان</span>
                                                <span class="h6 fw-light">4.0<i
                                                        class="fas fa-star text-warning ms-1"></i></span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- Course item END -->
                            </div>
                            <!-- Recently Viewed END -->

                            <!-- Tags START -->
                            <div class="card card-body shadow p-4">
                                <h4 class="mb-3 fs-5">برچسب ها</h4>
                                <ul class="list-inline mb-0">
                                    <li class="list-inline-item"><a class="btn btn-outline-light btn-sm"
                                                                    href="#">PHP</a></li>
                                    <li class="list-inline-item"><a class="btn btn-outline-light btn-sm" href="#">استارت
                                            آپ</a></li>
                                    <li class="list-inline-item"><a class="btn btn-outline-light btn-sm"
                                                                    href="#">HTML</a></li>
                                    <li class="list-inline-item"><a class="btn btn-outline-light btn-sm" href="#">bootstrap</a>
                                    </li>
                                    <li class="list-inline-item"><a class="btn btn-outline-light btn-sm" href="#">بانک
                                            اطلاعات</a></li>
                                    <li class="list-inline-item"><a class="btn btn-outline-light btn-sm" href="#">طراحی
                                            وب</a></li>
                                    <li class="list-inline-item"><a class="btn btn-outline-light btn-sm" href="#">برنامه
                                            نویسی</a></li>
                                    <li class="list-inline-item"><a class="btn btn-outline-light btn-sm" href="#">داده
                                            کاوی</a></li>
                                </ul>
                            </div>
                            <!-- Tags END -->
                        </div>
                    </div><!-- Row End -->
                </div>
                <!-- Right sidebar END -->

            </div><!-- Row END -->
        </div>
    </section>
    <!-- =======================
    Page content END -->

    <!-- =======================
    Listed courses START -->
    <section class="pt-0">
        <div class="container">
            <!-- Title -->
            <div class="row mb-4">
                <h2 class="mb-0 fs-4">دوره های پیشنهادی</h2>
            </div>

            <div class="row">
                <!-- Slider START -->
                <div class="tiny-slider arrow-round arrow-blur arrow-hover">
                    <div class="tiny-slider-inner" data-autoplay="false" data-arrow="true" data-edge="2"
                         data-dots="false" data-items="3" data-items-lg="2" data-items-sm="1">

                        <!-- Card Item START -->
                        <div class="pb-4">
                            <div class="card p-2 border">
                                <div class="rounded-top overflow-hidden">
                                    <div class="card-overlay-hover">
                                        <img src="{{url('assets/images/courses/4by3/17.jpg')}}" class="card-img-top"
                                             alt="course image">
                                    </div>
                                    <!-- Hover element -->
                                    <div class="card-img-overlay">
                                        <div class="card-element-hover d-flex justify-content-end">
                                            <a href="#" class="icon-md bg-white rounded-circle text-center">
                                                <i class="fas fa-shopping-cart text-danger"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <!-- Badge and icon -->
                                    <div class="d-flex justify-content-between">
                                        <!-- Rating and info -->
                                        <ul class="list-inline hstack gap-2 mb-0">
                                            <!-- Info -->
                                            <li class="list-inline-item d-flex justify-content-center align-items-center">
                                                <div class="icon-md bg-orange bg-opacity-10 text-orange rounded-circle">
                                                    <i class="fas fa-user-graduate"></i></div>
                                                <span class="h6 fw-light ms-2 mb-0">9.1k</span>
                                            </li>
                                            <!-- Rating -->
                                            <li class="list-inline-item d-flex justify-content-center align-items-center">
                                                <div
                                                    class="icon-md bg-warning bg-opacity-15 text-warning rounded-circle">
                                                    <i class="fas fa-star"></i></div>
                                                <span class="h6 fw-light ms-2 mb-0">4.5</span>
                                            </li>
                                        </ul>
                                        <!-- Avatar -->
                                        <div class="avatar avatar-sm">
                                            <img class="avatar-img rounded-circle" src="{{url('assets/images/avatar/09.jpg')}}"
                                                 alt="avatar">
                                        </div>
                                    </div>
                                    <!-- Divider -->
                                    <hr>
                                    <!-- Title -->
                                    <h5 class="card-title fw-normal"><a href="#">آموزش ساخت سایت خبری با لاراول</a></h5>
                                    <!-- Badge and Price -->
                                    <div class="d-flex justify-content-between align-items-center">
                                        <a href="#" class="badge bg-info bg-opacity-10 text-info"><i
                                                class="fas fa-circle small fw-bold me-2"></i>طراحی وب</a>
                                        <!-- Price -->
                                        <h3 class="text-success mb-0 fs-5">180,000 تومان</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Card Item END -->

                        <!-- Card Item START -->
                        <div class="pb-4">
                            <div class="card p-2 border">
                                <div class="rounded-top overflow-hidden">
                                    <div class="card-overlay-hover">
                                        <img src="{{url('assets/images/courses/4by3/18.jpg')}}" class="card-img-top"
                                             alt="course image">
                                    </div>
                                    <!-- Hover element -->
                                    <div class="card-img-overlay">
                                        <div class="card-element-hover d-flex justify-content-end">
                                            <a href="#" class="icon-md bg-white rounded-circle text-center">
                                                <i class="fas fa-shopping-cart text-danger"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <!-- Badge and icon -->
                                    <div class="d-flex justify-content-between">
                                        <!-- Rating and info -->
                                        <ul class="list-inline hstack gap-2 mb-0">
                                            <!-- Info -->
                                            <li class="list-inline-item d-flex justify-content-center align-items-center">
                                                <div class="icon-md bg-orange bg-opacity-10 text-orange rounded-circle">
                                                    <i class="fas fa-user-graduate"></i></div>
                                                <span class="h6 fw-light ms-2 mb-0">2.5k</span>
                                            </li>
                                            <!-- Rating -->
                                            <li class="list-inline-item d-flex justify-content-center align-items-center">
                                                <div
                                                    class="icon-md bg-warning bg-opacity-15 text-warning rounded-circle">
                                                    <i class="fas fa-star"></i></div>
                                                <span class="h6 fw-light ms-2 mb-0">3.6</span>
                                            </li>
                                        </ul>
                                        <!-- Avatar -->
                                        <div class="avatar avatar-sm">
                                            <img class="avatar-img rounded-circle" src="{{url('assets/images/avatar/07.jpg')}}"
                                                 alt="avatar">
                                        </div>
                                    </div>
                                    <!-- Divider -->
                                    <hr>
                                    <!-- Title -->
                                    <h5 class="card-title fw-normal"><a href="#">آموزش مقدماتی کتابخانه Pygame</a></h5>
                                    <!-- Badge and Price -->
                                    <div class="d-flex justify-content-between align-items-center">
                                        <a href="#" class="badge bg-info bg-opacity-10 text-info"><i
                                                class="fas fa-circle small fw-bold me-2"></i>طراحی سایت</a>
                                        <!-- Price -->
                                        <h3 class="text-success mb-0 fs-5">75,000 تومان</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Card Item END -->

                        <!-- Card Item START -->
                        <div class="pb-4">
                            <div class="card p-2 border">
                                <div class="rounded-top overflow-hidden">
                                    <div class="card-overlay-hover">
                                        <img src="{{url('assets/images/courses/4by3/21.jpg')}}" class="card-img-top"
                                             alt="course image">
                                    </div>
                                    <!-- Hover element -->
                                    <div class="card-img-overlay">
                                        <div class="card-element-hover d-flex justify-content-end">
                                            <a href="#" class="icon-md bg-white rounded-circle text-center">
                                                <i class="fas fa-shopping-cart text-danger"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <!-- Badge and icon -->
                                    <div class="d-flex justify-content-between">
                                        <!-- Rating and info -->
                                        <ul class="list-inline hstack gap-2 mb-0">
                                            <!-- Info -->
                                            <li class="list-inline-item d-flex justify-content-center align-items-center">
                                                <div class="icon-md bg-orange bg-opacity-10 text-orange rounded-circle">
                                                    <i class="fas fa-user-graduate"></i></div>
                                                <span class="h6 fw-light ms-2 mb-0">6k</span>
                                            </li>
                                            <!-- Rating -->
                                            <li class="list-inline-item d-flex justify-content-center align-items-center">
                                                <div
                                                    class="icon-md bg-warning bg-opacity-15 text-warning rounded-circle">
                                                    <i class="fas fa-star"></i></div>
                                                <span class="h6 fw-light ms-2 mb-0">3.8</span>
                                            </li>
                                        </ul>
                                        <!-- Avatar -->
                                        <div class="avatar avatar-sm">
                                            <img class="avatar-img rounded-circle" src="{{url('assets/images/avatar/05.jpg')}}"
                                                 alt="avatar">
                                        </div>
                                    </div>
                                    <!-- Divider -->
                                    <hr>
                                    <!-- Title -->
                                    <h5 class="card-title fw-normal"><a href="#">آموزش ساخت شبکه اجتماعی با MERN</a>
                                    </h5>
                                    <!-- Badge and Price -->
                                    <div class="d-flex justify-content-between align-items-center">
                                        <a href="#" class="badge bg-info bg-opacity-10 text-info"><i
                                                class="fas fa-circle small fw-bold me-2"></i> SEO</a>
                                        <!-- Price -->
                                        <h3 class="text-success mb-0 fs-5">270,000 تومان</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Card Item END -->

                        <!-- Card Item START -->
                        <div class="pb-4">
                            <div class="card p-2 border">
                                <div class="rounded-top overflow-hidden">
                                    <div class="card-overlay-hover">
                                        <img src="{{url('assets/images/courses/4by3/20.jpg')}}" class="card-img-top"
                                             alt="course image">
                                    </div>
                                    <!-- Hover element -->
                                    <div class="card-img-overlay">
                                        <div class="card-element-hover d-flex justify-content-end">
                                            <a href="#" class="icon-md bg-white rounded-circle text-center">
                                                <i class="fas fa-shopping-cart text-danger"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <!-- Badge and icon -->
                                    <div class="d-flex justify-content-between">
                                        <!-- Rating and info -->
                                        <ul class="list-inline hstack gap-2 mb-0">
                                            <!-- Info -->
                                            <li class="list-inline-item d-flex justify-content-center align-items-center">
                                                <div class="icon-md bg-orange bg-opacity-10 text-orange rounded-circle">
                                                    <i class="fas fa-user-graduate"></i></div>
                                                <span class="h6 fw-light ms-2 mb-0">15k</span>
                                            </li>
                                            <!-- Rating -->
                                            <li class="list-inline-item d-flex justify-content-center align-items-center">
                                                <div
                                                    class="icon-md bg-warning bg-opacity-15 text-warning rounded-circle">
                                                    <i class="fas fa-star"></i></div>
                                                <span class="h6 fw-light ms-2 mb-0">4.8</span>
                                            </li>
                                        </ul>
                                        <!-- Avatar -->
                                        <div class="avatar avatar-sm">
                                            <img class="avatar-img rounded-circle" src="{{url('assets/images/avatar/02.jpg')}}"
                                                 alt="avatar">
                                        </div>
                                    </div>
                                    <!-- Divider -->
                                    <hr>
                                    <!-- Title -->
                                    <h5 class="card-title fw-normal"><a href="#">دوره بازاریابی دیجیتال برای مبتدیان</a>
                                    </h5>
                                    <!-- Badge and Price -->
                                    <div class="d-flex justify-content-between align-items-center">
                                        <a href="#" class="badge bg-info bg-opacity-10 text-info"><i
                                                class="fas fa-circle small fw-bold me-2"></i>SEO</a>
                                        <!-- Price -->
                                        <h3 class="text-success mb-0 fs-5">70,000 تومان</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Card Item END -->
                    </div>
                </div>
                <!-- Slider END -->
            </div>
        </div>
    </section>
    <!-- =======================
    Listed courses END -->

</main>

{{--@assets--}}
{{--<link rel="stylesheet" href="{{url('assets/vendor/videojs/video-js.css')}}">--}}
{{--<script src="{{url('assets/vendor/videojs/video.min.js')}}"></script>--}}
{{--@endassets--}}
