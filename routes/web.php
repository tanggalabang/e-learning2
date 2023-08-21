<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\RelasiEditController;
use App\Http\Livewire\StudentsComponent;

use App\Http\Livewire\Admin\SiswaComponent;
use App\Http\Livewire\Admin\RelasiEditComponent;
use App\Http\Livewire\Products;

// Route::get('students', StudentsComponent::class);
// Route::get('products', Products::class);
Route::get('/test/{$id}', [RelasiEditController::class, 'index']);

Route::post('/admin/siswa/excel', [SiswaController::class, 'import']);
Route::get('/admin/siswa/excel', [SiswaController::class, 'export']);
Route::get('/admin/siswa/excel-example', [SiswaController::class, 'example']);

Route::get('/login', [AuthController::class, 'login']);
Route::post('/login', [AuthController::class, 'authLogin']);
Route::get('/register', [AuthController::class, 'register']);
Route::post('/register', [AuthController::class, 'authRegister']);
Route::get('/logout', [AuthController::class, 'logout']);

Route::get('/', function () {
  return view('welcome');
});

Route::group(['middleware' => 'admin'], function () {
  Route::get('/admin/dashboard', [DashboardController::class, 'dashboard']);

  Route::get('/admin/siswa', [SiswaController::class, 'list']);
  Route::post('/admin/siswa', [SiswaController::class, 'insert']);
  Route::put('/admin/siswa/{id}', [SiswaController::class, 'update']);
  Route::delete('/admin/siswa/{id}', [SiswaController::class, 'delete']);

  Route::get('/admin/guru', [GuruController::class, 'list']);
  Route::post('/admin/guru', [GuruController::class, 'insert']);
  Route::put('/admin/guru/{id}', [GuruController::class, 'update']);
  Route::delete('/admin/guru/{id}', [GuruController::class, 'delete']);


  // Route::get('/admin/siswa', function () {
  //   return view('admin.siswa.siswa');
  // });
  // Route::get('/admin/guru', function () {
  //   return view('admin.siswa.guru');
  // });
  Route::get('/admin/kelas', function () {
    return view('admin.siswa.kelas');
  });
  Route::get('/admin/mapel', function () {
    return view('admin.siswa.mapel');
  });
  Route::get('/admin/relasi', function () {
    return view('admin.siswa.relasi');
  });
  
  Route::get('/admin/relasi-edit/{id}', [RelasiEditComponent::class, 'relasi_edit']);

//  Route::post('/admin/siswa', [SiswaController::class, 'create']);
//   Route::put('/admin/siswa/{id}', [SiswaController::class, 'update']);
//   Route::delete('/admin/siswa/{id}', [SiswaController::class, 'delete']);
//   Route::post('/admin/siswa/excel', [SiswaController::class, 'import']);
//   Route::get('/admin/siswa/excel', [SiswaController::class, 'export']);
});
// Route::group(['middleware' => 'student'], function () {
//   Route::get('/student/dashboard', [DashboardController::class, 'dashboard']);
//
// });
