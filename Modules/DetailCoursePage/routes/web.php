<?php

use Illuminate\Support\Facades\Route;
use Modules\DetailCoursePage\Http\Controllers\DetailCoursePageController;
use Modules\DetailCoursePage\Livewire\DetailPage;

Route::get('/course_detail/{course}' , DetailPage::class)->name('course_detail');

//Mohsen was here mmosalla36@gmail.com 😎
