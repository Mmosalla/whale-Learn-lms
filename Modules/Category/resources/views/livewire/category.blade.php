<div class="page-content-wrapper border">
    <!-- Title -->
    <div class="row mb-3">
        <h1 class="h3 mb-5 mb-sm-0 fs-5">دسته بندی</h1>
        <div
            class="col-12 mt-5 d-sm-flex justify-content-between align-items-center"
        >
            <div class="card-body">
                <form wire:submit.prevent="createCategory" class="row g-4">
                    <!-- Input item -->
                    <div class="col-6">
                        <label class="form-label">عنوان دسته بندی</label>
                        <input wire:model="title" type="text" class="form-control"/>
                    </div>

                    <!-- Choice item -->
                    <div class="col-lg-6">
                        <label class="form-label">دسته پدر</label>
                        <select
                            class="form-select js-choice z-index-9 border-0 bg-light"
                            aria-label=".form-select-sm"
                            wire:model="parent_id"
                        >
                            <option value="0">دسته بندی اصلی</option>
                            @foreach($parentCategories as $key=>$value)
                                <option value="{{$key}}">{{$value}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="d-sm-flex justify-content-start">
                        <button type="submit" class="btn btn-primary mb-0">
                            افزودن دسته بندی
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Card START -->
    <div class="card bg-transparent border">
        <!-- Card body START -->
        <div class="card-body">
            <!-- Course table START -->
            <div class="table-responsive border-0 rounded-3">
                <!-- Table START -->
                <table
                    class="table table-dark-gray align-middle p-4 mb-0 table-hover"
                >
                    <!-- Table head -->
                    <thead>
                    <tr>
                        <th scope="col" class="border-0 align-items-center ">
                            ردیف
                        </th>
                        <th scope="col" class="border-0 rounded-start align-items-center">
                            نام دسته بندی
                        </th>
                        <th scope="col" class="border-0 align-items-center">دسته پدر</th>
                        <th scope="col" class="border-0 align-items-center">تاریخ ایجاد</th>
                        <th scope="col" class="border-0 rounded-end align-items-center">عملیات</th>
                    </tr>
                    </thead>

                    <!-- Table body START -->
                    <tbody>
                    <!-- Table row -->
                    @foreach($this->categories as $index=>$category )
                        <tr>
                            <td>
                                <div
                                    class="d-flex align-items-center position-relative"
                                >
                                    <!-- Title -->
                                    <h6 class="table-responsive-title mb-0 ms-2">

                                        {{ $this->categories->firstItem() + $index}}
                                    </h6>
                                </div>
                            </td>
                            <td>
                                <div
                                    class="d-flex align-items-center position-relative"
                                >
                                    <!-- Title -->
                                    <h6 class="table-responsive-title mb-0 ms-2">

                                        {{$category->title}}
                                    </h6>
                                </div>
                            </td>
                            <td>
                                <div
                                    class="d-flex align-items-center position-relative"
                                >
                                    <!-- Title -->
                                    <h6 class="table-responsive-title mb-0 ms-2">
                                        {{$category->parent->title}}
                                    </h6>
                                </div>
                            </td>
                            <td>{{\Hekmatinasser\Verta\Facades\Verta::instance($category->creted_at)}}</td>
                            \
                            <td>
                                <a
                                    href="#"
                                    class="btn btn-sm btn-success me-1 mb-1 mb-md-0"
                                >ویرایش</a
                                >
                                <button class="btn btn-sm btn-danger mb-0">حذف</button>
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

        <!-- Card footer START -->
        <div class="card-footer bg-transparent pt-0">
            <!-- Pagination START -->
            {{$this->categories->links('vendor.livewire.admin-new-bootstrap')}}
            <!-- Pagination END -->
        </div>
        <!-- Card footer END -->
    </div>
    <!-- Card END -->
</div>
