<?php

use Illuminate\Support\Facades\Route;
use Modules\Comments\Http\Controllers\CommentsController;
use Modules\Comments\Livewire\CourseComment;

Route::group(['middleware' => ['auth','verified'],'prefix' => 'admin'], function () {
    Route::get('course_comments', CourseComment::class)->name('admin.course.comments');
});
