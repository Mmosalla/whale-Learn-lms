<?php

use Illuminate\Support\Facades\Route;
use Modules\CourseListPage\Http\Controllers\CourseListPageController;

Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
    Route::apiResource('courselistpages', CourseListPageController::class)->names('courselistpage');
});
