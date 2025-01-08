<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->group(function () {
    Route::delete('/logout', [AuthController::class, 'destroy']);
    Route::get('/users', [AuthController::class, 'getUsers']);
});

// if needed on single page
// Route::post('/register', [AuthController::class, 'store'])->middleware(['auth:sanctum']);

Route::post('/register', [AuthController::class, 'store']);
Route::post('/login', [AuthController::class, 'login']);