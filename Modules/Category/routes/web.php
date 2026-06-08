<?php

use Illuminate\Support\Facades\Route;
use Modules\Category\Http\Controllers\CategoryController;
use Modules\Category\Livewire\Category;

Route::middleware(['auth', 'verified'])->prefix('admin')->group(function () {
    Route::get('categories', Category::class)->name('category');
});
