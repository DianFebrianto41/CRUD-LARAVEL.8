<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdiController;
use App\Http\Controllers\GedungController;
use App\Http\Controllers\RuanganController;
use App\Http\Controllers\FakultasController;
use App\Http\Controllers\MatakuliahController;
use App\Http\Controllers\TahunakademikController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::Resource('/fakultas', FakultasController::class);
Route::Resource('/ruangan', RuanganController::class);
Route::Resource('/prodi', ProdiController::class);
Route::Resource('/gedung', GedungController::class);
Route::Resource('/tahunakademik', TahunakademikController::class);
Route::Resource('/matakuliah', MatakuliahController::class);