<?php

use App\Http\Controllers\AccessController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VehicleController;
use Illuminate\Support\Facades\Route;

Route::get('/user/create', [UserController::class, 'create']);

Route::get('/user/get', [UserController::class, 'get']);
Route::get('/user/get/{id}', [UserController::class, 'getById']);

Route::get('/user/create/vehicles', [UserController::class, 'createVehicles']);

Route::get('user/{id}/access/get', [UserController::class, 'getAccess']);

Route::get('/user/{id}/vehicles/get', [UserController::class, 'getVehicles']);
Route::get('/vehicle/{id}/accesses/get', [VehicleController::class, 'getAccesses']);