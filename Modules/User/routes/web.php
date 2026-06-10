<?php

use Illuminate\Support\Facades\Route;
use Modules\User\Http\Controllers\UserController;

Route::middleware(['auth', 'verified'])->prefix('admin')->group(function () {
 Route::get('/users' , \Modules\User\Livewire\Users::class)->name('admin.users');
});
