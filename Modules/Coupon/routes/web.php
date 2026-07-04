<?php

use Illuminate\Support\Facades\Route;
use Modules\Coupon\Http\Controllers\CouponController;
use Modules\Coupon\Livewire\Coupon;

Route::middleware(['auth', 'verified'])->prefix('admin')->group(function () {
    Route::get('/coupon', Coupon::class)->name('coupons');
});

//Mohsen was here mmosalla36@gmail.com 😎
