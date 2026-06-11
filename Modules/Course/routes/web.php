<?php

use Illuminate\Support\Facades\Route;
use Modules\Course\Http\Controllers\CourseController;
use Modules\Course\Livewire\AddCourse;
use Modules\Course\Livewire\Courses;
use Modules\Course\Livewire\TeacherCourse;

Route::middleware(['auth', 'verified'])->prefix('admin')->group(function () {
    // Admin Course Status Management
    Route::get('/courses' , Courses::class)->name('admin.courses');
    // Teacher Course Management
    Route::get('/teacher_courses' , TeacherCourse::class)->name('admin.teacher_courses');
    // Add Course
    Route::get('/add_course' , AddCourse::class)->name('admin.teacher.add_course`');

});


// Mohsen was here mmosalla36@gmail.com 😎
