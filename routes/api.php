<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TimesheetController;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:api')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);

    // Standard CRUD operations for Users, Projects, Timesheets
    Route::apiResource('/users', UserController::class);
    Route::apiResource('/projects', ProjectController::class);
    Route::apiResource('/timesheets', TimesheetController::class);
});