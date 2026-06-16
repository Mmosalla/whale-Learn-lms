<div class="page-content-wrapper border">
    <div class="card bg-transparent border">
        <!-- Card body START -->
        <div class="card-body">
            <!-- Course table START -->
            <div class="table-responsive border-0 rounded-3">
                <!-- Table START -->
                <table class="table table-dark-gray align-middle p-4 mb-0 table-hover">
                    <!-- Table head -->
                    <thead>
                    <tr>
                        <th scope="col" class="border-0 rounded-start">ردیف</th>
                        <th scope="col" class="border-0">نام کاربر</th>
                        <th scope="col" class="border-0 rounded-start">عنوان دوره</th>
                        <th scope="col" class="border-0">متن نظر</th>
                        <th scope="col" class="border-0">تاریخ ایجاد</th>
                        <th scope="col" class="border-0 rounded-end">عملیات</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($this->comments as $index =>$comment)
                        <tr>
                            <td>
                                <div class="d-flex align-items-center position-relative">
                                    <h6 class="table-responsive-title mb-0 ms-2">
                                        <a href="#" class="stretched-link">{{$this->comments->firstItem() + $index}}</a>
                                    </h6>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center position-relative">
                                    <h6 class="table-responsive-title mb-0 ms-2">
                                        <a href="#" class="stretched-link">{{$comment->user->name}}</a>
                                    </h6>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center position-relative">
                                    <h6 class="table-responsive-title mb-0 ms-2">
                                        <a href="#" class="stretched-link">{{$comment->course->title}}</a>
                                    </h6>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center position-relative">
                                    <h6 class="table-responsive-title mb-0 ms-2">
                                        <a href="#" class="stretched-link">{{$comment->text}}</a>
                                    </h6>
                                </div>
                            </td>
                            <td>{{ \Hekmatinasser\Verta\Verta::instance($comment->created_at)->format('%B %d، %Y') }}</td>
                            <td wire:click="changeCourseCommentStatus({{$comment->id}})">
                                @if($comment->status == \Modules\Comments\app\Enums\CourseCommentStatus::Draft->value)
                                    <a href="#" class="btn btn-sm btn-info me-1 mb-1 mb-md-0">پیش نویس</a>
                                @elseif($comment->status == \Modules\Comments\app\Enums\CourseCommentStatus::Accepted->value)
                                    <a href="#" class="btn btn-sm btn-success me-1 mb-1 mb-md-0">پذیرفته شده</a>
                                @elseif($comment->status == \Modules\Comments\app\Enums\CourseCommentStatus::Rejected->value)
                                    <a href="#" class="btn btn-sm btn-danger me-1 mb-1 mb-md-0">رد شده</a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    <!-- Table body END -->
                </table>
                <!-- Table END -->
            </div>
            <!-- Course table END -->
        </div>
        <!-- Card body END -->

        <div class="card-footer bg-transparent pt-0">
            <!-- Pagination START -->
            <div class="d-sm-flex justify-content-sm-between align-items-sm-center">
                {{$this->comments->links('vendor.livewire.admin-new-bootstrap')}}
            </div>
            <!-- Pagination END -->
        </div>
    </div>
</div>

{{--Mohsen was here mmosalla36@gmail.com😎--}}
