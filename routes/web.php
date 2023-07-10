<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [AuthController::class, 'login']);
Route::post('/login', [AuthController::class, 'authLogin']);
Route::get('/logout', [AuthController::class, 'logout']);

Route::get('/', function () {
  return view('welcome');
});

Route::group(['middleware' => 'admin'], function () {
      Route::get('/admin/dashboard', [DashboardController::class, 'dashboard']);
});
Route::group(['middleware' => 'student'], function () {
        Route::get('/student/dashboard', [DashboardController::class, 'dashboard']);

});