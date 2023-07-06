<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SoalController;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\JawabanController;

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

Route::get('/', [AuthController::class, 'login'])->name('login');
Route::post('/', [AuthController::class, 'login_action'])->name('login.action');
Route::get('/register', [AuthController::class, 'register']);
Route::post('/register', [AuthController::class, 'register_action']);

Route::group(['middleware' => ['auth', 'OnlyAdmin']], function () {
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/dashboard', [AuthController::class, 'dashboard']);
    Route::get('/mahasiswa', [AuthController::class, 'mahasiswa']);
    Route::get('/mahasiswa/verifikasi/{id}', [AuthController::class, 'mahasiswa_verifikasi']);
    Route::get('/soal', [SoalController::class, 'index']);
    Route::post('/soal', [SoalController::class, 'store']);
    Route::get('/soal/mulai', [SoalController::class, 'mulai_ujian']);
    Route::get('/soal/akhiri', [SoalController::class, 'akhiri_ujian']);
    Route::post('/soal/edit/{id}', [SoalController::class, 'update']);
    Route::get('/soal/hapus/{id}', [SoalController::class, 'destroy']);
    Route::get('/soal/jawaban/{id}', [JawabanController::class, 'edit']);
    Route::post('/soal/jawaban/{id}', [JawabanController::class, 'update']);
});

Route::group(['middleware' => ['auth', 'OnlyMahasiswa']], function () {
    Route::get('/home', [AuthController::class, 'dashboard_mahasiswa']);
    Route::get('/ujian', [AuthController::class, 'ujian_mahasiswa']);
    Route::get('/ujian/soal', [AuthController::class, 'soal_mahasiswa'])->middleware('StartUjian');
    Route::post('/ujian/soal/{id}', [NilaiController::class, 'jawab_mahasiswa'])->middleware('StartUjian');
    Route::get('/nilai', [AuthController::class, 'nilai']);
});