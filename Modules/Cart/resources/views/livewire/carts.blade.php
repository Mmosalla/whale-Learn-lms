<main>

    <!-- =======================
    Page Banner START -->
    <section class="py-0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="bg-light p-4 text-center rounded-3">
                        <h1 class="m-0 fs-2">سبد خرید</h1>
                        <!-- Breadcrumb -->
                        <div class="d-flex justify-content-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb breadcrumb-dots mb-0">
                                    <li class="breadcrumb-item"><a href="#">صفحه اصلی</a></li>
                                    <li class="breadcrumb-item"><a href="#">صفحات</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">سبد خرید</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- =======================
    Page Banner END -->

    <!-- =======================
    Page content START -->
    <section class="pt-5">
        <div class="container">

            <div class="row g-4 g-sm-5">
                <!-- Main content START -->
                <div class="col-lg-8 mb-4 mb-sm-0">
                    <div class="card card-body p-4 shadow">

                        <div class="table-responsive border-0 rounded-3">
                            <!-- Table START -->
                            <table class="table align-middle p-4 mb-0">
                                <!-- Table head -->
                                <!-- Table body START -->
                                <tbody class="border-top-0">
                                <tr>
                                    <th class="text-center">عکس دوره</th>
                                    <th class="text-center">عنوان دوره</th>
                                    <th class="text-center">قیمت دوره</th>
                                    <th class="text-center">قیمت با تخفیف</th>
                                    <th class="text-center">عملیات</th>
                                </tr>
                                <!-- Table item -->
                                @foreach($carts as $cart)
                                    <tr>
                                        <!-- Course item -->
                                        <td>
                                            <div class="w-100px w-md-80px mb-2 mb-md-0">
                                                <img src="{{url('images/courses/'.$cart->course->id.'/'. $cart->course->image)}}" class="rounded" alt="">
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <h6 class="mb-0 ms-lg-3 mt-2 mt-lg-0">
                                                <a href="{{route('course.details', $cart->course->id)}}">{{$cart->course->title}}</a>
                                            </h6>
                                        </td>
                                        <!-- Amount item -->
                                        <td class="text-center">
                                            <h5 class="text-success mb-0">{{$cart->course->price}} تومان</h5>
                                        </td>
                                        <td class="text-center">
                                            <h5 class="text-success mb-0">{{ $cart->course->price - (($cart->course->price * $cart->course->discount ) / 100) }} تومان</h5>
                                        </td>
                                        <!-- Action item -->
                                        <td>
                                            <button wire:click="deleteCartCourse({{$cart->id}})" class="btn btn-sm btn-danger-soft px-2 mb-0"><i class="fas fa-fw fa-times"></i></button>
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>

                        <!-- Coupon input and button -->
                        <div class="row g-3 mt-2">
                            <div class="col-md-6">
                                <div class="input-group">
                                    <input wire:model="coupon_code" class="form-control form-control " placeholder="">
                                    <button wire:click="checkCoupon" type="button" class="btn btn-primary">اعمال کد تخفیف</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Main content END -->

                <!-- Right sidebar START -->
                <div class="col-lg-4">
                    <!-- Card total START -->
                    <div class="card card-body p-4 shadow">
                        <!-- Title -->
                        <h4 class="mb-3 fs-5">صورت حساب</h4>

                        <!-- Price and detail -->
                        <ul class="list-group list-group-borderless mb-2">
                            <li class="list-group-item px-0 d-flex justify-content-between">
                                <span class="h6 fw-light mb-0">قیمت</span>
                                <span class="h6 fw-light mb-0 fw-bold">{{$total_price}}  تومان </span>
                            </li>
                            <li class="list-group-item px-0 d-flex justify-content-between">
                                <span class="h6 fw-light mb-0">میزان تخفیف</span>
                                <span class="text-danger">{{$total_discount}}  تومان </span>
                            </li>
                            <li class="list-group-item px-0 d-flex justify-content-between">
                                <span class="h5 mb-0">قیمت نهایی</span>
                                <span class="h5 mb-0">{{$total_price - $total_discount}}  تومان </span>
                            </li>
                        </ul>

                        <!-- Button -->
                        <div class="d-grid">
                            <a href="#" wire:click="payment" class="btn btn-lg btn-success">تسویه حساب</a>
                        </div>

                        <!-- Content -->
                        <p class="small mb-0 mt-2 text-center">با تکمیل خرید خود، <a href="#"><strong>شرایط و قوانین سایت</strong></a> را خواهید پذیرفت.</p>

                    </div>
                    <!-- Card total END -->
                </div>
                <!-- Right sidebar END -->

            </div><!-- Row END -->
        </div>
    </section>
    <!-- =======================
    Page content END -->

</main>

{{--Mohsen was here mmosalla36@gmail.com 😎--}}
