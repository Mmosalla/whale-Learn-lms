<?php

use Illuminate\Support\Facades\Route;
use Modules\Course\Http\Controllers\CourseController;
use Modules\Course\Livewire\Courses;

Route::middleware(['auth', 'verified'])->prefix('admin')->group(function () {
    Route::get('/courses' , Courses::class)->name('admin.courses');
});
