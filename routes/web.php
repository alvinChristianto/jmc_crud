<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProvinceController;
use App\Http\Controllers\RegencyController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [ProvinceController::class, 'index'])->name('welcome');
Route::get('/province/create', [ProvinceController::class, 'create'])->name('province.create');
Route::post('/province', [ProvinceController::class, 'store'])->name('province.store');
Route::get('/province/{province}/edit', [ProvinceController::class, 'edit'])->name('province.edit');
Route::put('/province/{province}/update', [ProvinceController::class, 'update'])->name('province.update');
Route::delete('/province/{province}/destroy', [ProvinceController::class, 'destroy'])->name('province.destroy');

Route::get('/regency/create', [RegencyController::class, 'create'])->name('regency.create');
Route::post('/regency', [RegencyController::class, 'store'])->name('regency.store');

Route::get('/{province}/regencies', [RegencyController::class, 'listRegencies'])->name('regency.listRegencies');
Route::get('/search-by-province', [ProvinceController::class, 'searchProvince'])->name('province.search');