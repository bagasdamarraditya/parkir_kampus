<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KendaraanController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\AreaParkirController;
use App\Http\Controllers\JenisController;
use App\Http\Controllers\KampusController;
use App\Models\Jenis;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('admin/dashboard', [DashboardController::class, 'index']);


Route::get('admin/jenis', [JenisController::class, 'index']);
Route::get('admin/jenis/create', [JenisController::class, 'create']);
Route::post('admin/jenis/store', [JenisController::class, 'store']);
Route::get('admin/jenis/edit/{id}', [JenisController::class, 'edit']);
Route::put('admin/jenis/update/{id}', [JenisController::class, 'update']);
Route::delete('admin/jenis/delete/{id}', [JenisController::class, 'destroy']);


Route::get('admin/kampus', [KampusController::class, 'index']);
Route::get('admin/kampus/create', [KampusController::class, 'create']);
Route::post('admin/kampus/store', [KampusController::class, 'store']);
Route::get('admin/kampus/edit/{id}', [KampusController::class, 'edit']);
Route::put('admin/kampus/update/{id}', [KampusController::class, 'update']);
Route::delete('admin/kampus/delete/{id}', [KampusController::class, 'destroy']);


Route::get('admin/kendaraan', [KendaraanController::class, 'index']);
Route::get('admin/kendaraan/create',[KendaraanController::class, 'create']);
Route::post('admin/kendaraan/store',[KendaraanController::class, 'store']);
Route::get('admin/kendaraan/edit/{id}',[KendaraanController::class,'edit']);
Route::put('admin/kendaraan/update/{id}',[KendaraanController::class,'update']);
Route::delete('admin/kendaraan/delete/{id}', [KendaraanController::class, 'destroy']);


Route::get('admin/transaksi', [TransaksiController::class, 'index']);
Route::get('admin/transaksi/create',[TransaksiController::class, 'create']);
Route::post('admin/transaksi/store',[TransaksiController::class, 'store']);
Route::get('admin/transaksi/edit/{id}',[TransaksiController::class,'edit']);
Route::put('admin/transaksi/update/{id}',[TransaksiController::class,'update']);
Route::delete('admin/transaksi/delete/{id}', [TransaksiController::class, 'destroy']);


Route::get('admin/area_parkir', [AreaParkirController::class, 'index']);
Route::get('admin/area_parkir/create', [AreaParkirController::class, 'create']);
Route::post('admin/area_parkir/store', [AreaParkirController::class, 'store']);
Route::get('admin/area_parkir/edit/{id}', [AreaParkirController::class, 'edit']);
Route::put('admin/area_parkir/update/{id}', [AreaParkirController::class, 'update']);
Route::delete('admin/area_parkir/delete/{id}', [AreaParkirController::class, 'destroy']);

