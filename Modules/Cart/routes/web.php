<?php

use Illuminate\Support\Facades\Route;
use Modules\Cart\Http\Controllers\CartController;
use Modules\Cart\Livewire\Carts;

Route::get('/user_cart' , Carts::class )->name('user.cart');

// Mohsen was here mmosalla36@gmail.com 😎
