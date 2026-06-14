<?php

use Illuminate\Support\Facades\Route;
use Modules\HomePage\Http\Controllers\HomePageController;
use Modules\HomePage\Livewire\Homepage;

Route::get('/', Homepage::class)->name('home');
