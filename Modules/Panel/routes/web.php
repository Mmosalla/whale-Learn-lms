<?php

use Illuminate\Support\Facades\Route;


Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::get('/dashboard', \Modules\Panel\Livewire\Dashboard::class)
        ->name('dashboard');
});


// Mohsen was here mmosalla36@gmail.com
