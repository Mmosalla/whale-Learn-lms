<?php

use Illuminate\Support\Facades\Route;
use Modules\RolePermissions\Http\Controllers\RolePermissionsController;
use Modules\RolePermissions\Livewire\Permissions;
use Modules\RolePermissions\Livewire\Roles;

Route::middleware(['auth', 'verified'])->prefix('admin')->group(function () {
    Route::get('roles' , Roles::class)->name('roles');
    Route::get('permissions' , Permissions::class)->name('permissions');
});
