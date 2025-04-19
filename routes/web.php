<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\GuruController;
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

Route::get('/hal-sekolah', function () {
    return view('sekolah');
});

Route::get('/kewajiban', function () {
    return view('kewajiban');
});

Route::get('/larangan', function () {
    return view('larangan');
});

Route::get('/hak', function () {
    return view('hak');
});

Route::get('/lainnya', function () {
    return view('lain');
});

Route::get('auth', [PublicController::class, 'getAuth']);
Route::post('auth', [PublicController::class, 'login'])->name('login');
Route::post('/logout', [PublicController::class, 'logout'])->name('logout');

Route::middleware(['auth', 'role:superadmin,admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/user', [AdminController::class, 'getUsers'])->name('admin.users')->middleware('onlyadmin');
    Route::post('/users/import', [AdminController::class, 'import'])->name('users.import')->middleware('onlyadmin');
    Route::delete('/users/delete-multiple', [AdminController::class, 'deleteMultiple'])->name('users.deleteMultiple')->middleware('onlyadmin');
    Route::get('/admin/laporan', [AdminController::class, 'getLaporan'])->name('admin.laporan');
    Route::post('/admin/detail_laporan', [AdminController::class, 'getDetailLaporan'])->name('admin.laporan.detail');
    Route::get('admin/image/{id}', [SiswaController::class, 'showEncryptedImage'])->name('admin.image.show');
    Route::get('admin/image_sanggah/{id}', [SiswaController::class, 'showEncryptedImage2'])->name('admin.image.sanggah.show');
    Route::post('/kategori/import', [AdminController::class, 'importKategori'])->name('kategori.import')->middleware('onlyadmin');
    Route::get('/admin/kategori', [AdminController::class, 'getKategori'])->name('admin.kategori')->middleware('onlyadmin');
    Route::delete('/kategori/delete-multiple', [AdminController::class, 'deleteMultipleKategori'])->name('kategori.deleteMultiple')->middleware('onlyadmin');
    Route::post('/admin/laporan/tolak/{id}', [AdminController::class, 'tolakLaporan'])->name('admin.tolak');
    Route::post('/admin/laporan/terima/{id}', [AdminController::class, 'terimaLaporan'])->name('admin.terima');
    Route::get('/admin/401', function(){return view('admin.notauth');})->name('admin.notauth');
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

Route::middleware(['auth', 'role:guru'])->group(function(){
    Route::get('/guru/dashboard', [GuruController::class, 'index'])->name('guru.dashboard');
    Route::get('/guru/laporan', [GuruController::class, 'getLaporan'])->name('guru.laporan');
    Route::post('/guru/detail_laporan', [GuruController::class, 'getDetailLaporan'])->name('guru.laporan.detail');
    Route::get('guru/image/{id}', [SiswaController::class, 'showEncryptedImage'])->name('guru.image.show');
    Route::get('guru/image_sanggah/{id}', [SiswaController::class, 'showEncryptedImage2'])->name('guru.image.sanggah.show');
});
