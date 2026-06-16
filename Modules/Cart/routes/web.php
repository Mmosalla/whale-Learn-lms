<?php

use Illuminate\Support\Facades\Route;
use Modules\Cart\Http\Controllers\CartController;
use Modules\Cart\Livewire\Carts;

Route::get('/cart/{course}' , Carts::class )->name('course.cart');

// Mohsen was here mmosalla36@gmail.com 😎
