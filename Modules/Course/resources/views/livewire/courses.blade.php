@php
    use Hekmatinasser\Verta\Verta;
    use Modules\Course\app\Enums\CourseEnums;
@endphp

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
                        <th scope="col" class="border-0 rounded-start">نام دوره</th>
                        <th scope="col" class="border-0 rounded-start">نام مدرس</th>
                        <th scope="col" class="border-0">قیمت دوره</th>
                        <th scope="col" class="border-0">تاریخ ایجاد</th>
                        <th scope="col" class="border-0 rounded-end">وضعیت</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($courses as $index=>$course)
                        <tr>
                            <td>
                                <div class="d-flex align-items-center position-relative">
                                    {{$courses->firstItem() + $index}}
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center position-relative">
                                    <h6 class="table-responsive-title mb-0 ms-2">
                                        <a href="#" class="stretched-link">{{$course->title}}</a>
                                    </h6>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center position-relative">
                                    <h6 class="table-responsive-title mb-0 ms-2">
                                        <a href="#" class="stretched-link">{{$course->user->name}}</a>
                                    </h6>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center position-relative">
                                    <h6 class="table-responsive-title mb-0 ms-2">
                                        <a href="#" class="stretched-link">{{$course->price}}</a>
                                    </h6>
                                </div>
                            </td>

                            <td>{{ Verta::instance($course->created_at)->format('%B %d، %Y') }}</td>
                            <td>
                                @if($course->status === CourseEnums::Draft->value)
                                    <a href="#" wire:click="chengStatusCourse({{$course->id}})"
                                       class="btn btn-sm btn-secondary me-1 mb-1 mb-md-0">پیش فرض</a>
                                @elseif($course->status === CourseEnums::Active->value)
                                    <a href="#" wire:click="chengStatusCourse({{$course->id}})"
                                       class="btn btn-sm btn-success me-1 mb-1 mb-md-0">فعال</a>
                                @elseif($course->status === CourseEnums::Rejected->value)
                                    <a href="#" wire:click="chengStatusCourse({{$course->id}})"
                                       class="btn btn-sm btn-danger me-1 mb-1 mb-md-0">رد شده</a>
                                @elseif($course->status === CourseEnums::Archived->value)
                                    <a href="#" wire:click="chengStatusCourse({{$course->id}})"
                                       class="btn btn-sm btn-warning me-1 mb-1 mb-md-0">آرشیو</a>
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
                {{$courses->links('vendor.livewire.admin-new-bootstrap')}}
            </div>
            <!-- Pagination END -->
        </div>
    </div>
</div>


@push('scripts')
    <script>
        document.addEventListener('livewire:init', () => {
            Livewire.on('statusChanged', (event) => {
                const toast = window.Swal.mixin({
                    toast: true,
                    position: 'bottom',
                    showConfirmButton: false,
                    timer: 2500,
                    padding: '2em',
                });
                toast.fire({
                    icon: 'success',
                    title: 'وضعیت با موفقیت تغییر کرد',
                    padding: '2em',
                });
            })
        })
    </script>
@endpush


{{--// Mohsen was here mmosalla36@gmail.com😎--}}
