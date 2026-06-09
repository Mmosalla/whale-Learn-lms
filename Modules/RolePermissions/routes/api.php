<?php

use Illuminate\Support\Facades\Route;
use Modules\RolePermissions\Http\Controllers\RolePermissionsController;

Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
    Route::apiResource('rolepermissions', RolePermissionsController::class)->names('rolepermissions');
});
