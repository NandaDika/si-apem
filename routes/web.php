<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\SiswaController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('index');
});

Route::get('auth', [PublicController::class, 'getAuth']);
Route::post('auth', [PublicController::class, 'login'])->name('login');
Route::post('/logout', [PublicController::class, 'logout'])->name('logout');

Route::middleware(['auth', 'role:superadmin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/user', [AdminController::class, 'getUsers'])->name('admin.users');
    Route::post('/users/import', [AdminController::class, 'import'])->name('users.import');
    Route::delete('/users/delete-multiple', [AdminController::class, 'deleteMultiple'])->name('users.deleteMultiple');
    Route::get('/admin/laporan', [AdminController::class, 'getLaporan'])->name('admin.laporan');
    Route::post('/admin/detail_laporan', [AdminController::class, 'getDetailLaporan'])->name('admin.laporan.detail');
    Route::get('admin/image/{id}', [SiswaController::class, 'showEncryptedImage'])->name('admin.image.show');
    Route::get('admin/image_sanggah/{id}', [SiswaController::class, 'showEncryptedImage2'])->name('admin.image.sanggah.show');
    Route::post('/kategori/import', [AdminController::class, 'importKategori'])->name('kategori.import');
    Route::get('/admin/kategori', [AdminController::class, 'getKategori'])->name('admin.kategori');
    Route::delete('/kategori/delete-multiple', [AdminController::class, 'deleteMultipleKategori'])->name('kategori.deleteMultiple');
    Route::post('/admin/laporan/tolak/{id}', [AdminController::class, 'tolakLaporan'])->name('admin.tolak');
    Route::post('/admin/laporan/terima/{id}', [AdminController::class, 'terimaLaporan'])->name('admin.terima');
});

Route::middleware(['auth', 'role:siswa'])->group(function(){
    Route::get('/siswa/dashboard', [SiswaController::class, 'index'])->name('siswa.dashboard');
    Route::get('/siswa/lapor', [SiswaController::class, 'pageLaporan'])->name('siswa.lapor');
    Route::post('/siswa/lapor/submit', [SiswaController::class, 'submitLaporan'])->name('siswa.laporan.submit');
    Route::get('/siswa/riwayat_laporan', [SiswaController::class, 'pageRiwayatLaporan'])->name('siswa.riwayat');
    Route::get('/siswa/laporan', [SiswaController::class, 'pageDilaporkan'])->name('siswa.dilaporkan');
    Route::post('/siswa/detail_laporan', [SiswaController::class, 'getDetailLaporan'])->name('siswa.laporan.detail');
    Route::get('/image/{id}', [SiswaController::class, 'showEncryptedImage'])->name('image.show');
    Route::get('/image_sanggah/{id}', [SiswaController::class, 'showEncryptedImage2'])->name('image.sanggah.show');
    Route::post('/siswa/sanggah', [SiswaController::class, 'getDetailSanggah'])->name('siswa.laporan.sanggah');
    Route::post('/siswa/sanggah/update/{id}', [SiswaController::class, 'updateSanggah'])->name('siswa.laporan.sanggah.upload');
});
