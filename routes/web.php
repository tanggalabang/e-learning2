<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiswaController;

Route::get('/login', [AuthController::class, 'login']);
Route::post('/login', [AuthController::class, 'authLogin']);
Route::get('/logout', [AuthController::class, 'logout']);
Route::get('/register', [AuthController::class, 'register']);
Route::post('/register', [AuthController::class, 'authRegister']);

Route::get('/', function () {
  return view('welcome');
});

Route::group(['middleware' => 'admin'], function () {
      Route::get('/admin/dashboard', [DashboardController::class, 'dashboard']);
      Route::get('/admin/siswa', [SiswaController::class, 'list']);
      Route::post('/admin/siswa', [SiswaController::class, 'create']);
      Route::put('/admin/siswa/{id}', [SiswaController::class, 'update']);
      Route::delete('/admin/siswa/{id}', [SiswaController::class, 'delete']);
      Route::post('/admin/siswa/excel', [SiswaController::class, 'import']);
      Route::get('/admin/siswa/excel', [SiswaController::class, 'export']);
});
Route::group(['middleware' => 'student'], function () {
        Route::get('/student/dashboard', [DashboardController::class, 'dashboard']);

});