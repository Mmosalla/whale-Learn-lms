<?php

use Illuminate\Support\Facades\Route;
use Modules\Auth\Http\Controllers\AuthController;
use Modules\Auth\Http\Controllers\VerifyEmailController;
use Modules\Auth\Livewire\EmailVerification;
use Modules\Auth\Livewire\ForgetPassword;
use Modules\Auth\Livewire\Login;
use Modules\Auth\Livewire\Register;
use Modules\Auth\Livewire\ResetPsassword;

Route::group([ "middleware" => ['guest']] , function () {
    // Register User
    Route::get('register', Register::class)->name('register');
    // Login User
    Route::get('login', Login::class)->name('login');
    //Forget Password User
    Route::get('forget_password', ForgetPassword::class)->name('forget-password');
    // User Forget Password
    Route::get('forget_password', ForgetPassword::class)->name('forget-password');
    Route::get('reset-password/{token}', ResetPsassword::class)->name('password.reset');

});
//User is Validated
Route::group([ "middleware" => ['auth']] , function () {
    // Logout User
    Route::get('/logout', function () {
        auth()->logout();
    });
    //ٍEmail Verification
    Route::get('verify_email', EmailVerification::class )->name('verification.notice');
    Route::get('verify-email/{id}/{hash}',[VerifyEmailController::class,'verify'])
        ->middleware(['signed','throttle:6,1'])
        ->name('verification.verify');
});





// Mohsen was here mmosalla@gmail.com 😎
