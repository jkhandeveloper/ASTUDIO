<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TimesheetController;
use App\Http\Controllers\AttributeController;
use App\Http\Controllers\AttributeValueController ;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:api')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);

    // Standard CRUD operations for Users, Projects, Timesheets
    Route::apiResource('/users', UserController::class);
    Route::apiResource('/projects', ProjectController::class);
    Route::apiResource('/projects', ProjectController::class);
    Route::apiResource('/attributes', AttributeController::class);
    Route::apiResource('/attribute-values', AttributeValueController::class);
});