<?php

use Illuminate\Support\Facades\Route;
use Modules\Auth\Http\Controllers\AuthController;
use Modules\Auth\Livewire\ForgetPassword;
use Modules\Auth\Livewire\Login;
use Modules\Auth\Livewire\Register;

Route::group([ "middleware" => ['guest']] , function () {
    // Register User
    Route::get('register', Register::class)->name('register');
    // Login User
    Route::get('login', Login::class)->name('login');
    //Forget Password User
    Route::get('forget_password', ForgetPassword::class)->name('forget-password');

});


// Mohsen was here mmosalla@gmail.com 😎
