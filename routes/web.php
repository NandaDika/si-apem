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
    Route::get('/admin/user/create', [AdminController::class, 'createUser'])->name('admin.user.create')->middleware('onlyadmin');
    Route::post('/admin/user/store', [AdminController::class, 'storeUser'])->name('admin.user.store')->middleware('onlyadmin');
    // Route untuk menampilkan form edit
    Route::get('/admin/user/{id}/edit', [AdminController::class, 'editUser'])->name('admin.user.edit')->middleware('onlyadmin');
    // Route untuk memproses update data
    Route::put('/admin/user/{id}', [AdminController::class, 'updateUser'])->name('admin.user.update')->middleware('onlyadmin');

    Route::post('/admin/user/change-password', [AdminController::class, 'showChangePasswordForm'])
    ->name('admin.user.change-password')
    ->middleware('onlyadmin');
    // Tampilkan form ubah password
    Route::post('/admin/user/change-password', [AdminController::class, 'showChangePasswordForm'])->name('admin.user.change-password')->middleware('onlyadmin');
    // Proses form ubah password
    Route::post('/admin/user/{id}/change-password', [AdminController::class, 'changePassword'])->name('admin.user.update-password')->middleware('onlyadmin');
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
    Route::get('/admin/401', function(){return view('admin.noauth');})->name('admin.notauth');
});

Route::middleware(['auth', 'role:siswa,staff_tendik'])->group(function(){
    Route::get('/user/dashboard', [SiswaController::class, 'index'])->name('siswa.dashboard');
    Route::get('/user/lapor', [SiswaController::class, 'pageLaporan'])->name('siswa.lapor');
     // Tampilkan form ubah password
    Route::post('/user/change-password', [SiswaController::class, 'showChangePasswordForm'])->name('siswa.change-password');
     // Proses form ubah password
    Route::post('/user/{id}/change-password', [SiswaController::class, 'changePassword'])->name('siswa.update-password');
    Route::post('/user/lapor/submit', [SiswaController::class, 'submitLaporan'])->name('siswa.laporan.submit');
    Route::get('/user/riwayat_laporan', [SiswaController::class, 'pageRiwayatLaporan'])->name('siswa.riwayat');
    Route::get('/user/laporan', [SiswaController::class, 'pageDilaporkan'])->name('siswa.dilaporkan');
    Route::post('/user/detail_laporan', [SiswaController::class, 'getDetailLaporan'])->name('siswa.laporan.detail');
    Route::get('/user/{id}', [SiswaController::class, 'showEncryptedImage'])->name('image.show');
    Route::get('/image_sanggah/{id}', [SiswaController::class, 'showEncryptedImage2'])->name('image.sanggah.show');
    Route::post('/user/sanggah', [SiswaController::class, 'getDetailSanggah'])->name('siswa.laporan.sanggah');
    Route::post('/user/sanggah/update/{id}', [SiswaController::class, 'updateSanggah'])->name('siswa.laporan.sanggah.upload');
});

Route::middleware(['auth', 'role:guru'])->group(function(){
    Route::get('/guru/lapor', [GuruController::class, 'pageLaporan'])->name('guru.lapor');
    Route::post('/guru/lapor/submit', [GuruController::class, 'submitLaporan'])->name('guru.laporan.submit');
    Route::get('/guru/dashboard', [GuruController::class, 'index'])->name('guru.dashboard');
    Route::get('/guru/laporan', [GuruController::class, 'getLaporan'])->name('guru.laporan');
    Route::get('/guru/riwayat_laporan', [GuruController::class, 'getRiwayatLaporan'])->name('guru.riwayat');
    Route::get('/guru/dilaporkan', [GuruController::class, 'getDilaporkan'])->name('guru.dilaporkan');
    // Tampilkan form ubah password
    Route::post('/guru/change-password', [GuruController::class, 'showChangePasswordForm'])->name('guru.change-password');
    // Proses form ubah password
    Route::post('/guru/{id}/change-password', [GuruController::class, 'changePassword'])->name('guru.update-password');
    Route::post('/guru/detail_laporan', [GuruController::class, 'getDetailLaporan'])->name('guru.laporan.detail');
    Route::get('guru/image/{id}', [SiswaController::class, 'showEncryptedImage'])->name('guru.image.show');
    Route::get('guru/image_sanggah/{id}', [SiswaController::class, 'showEncryptedImage2'])->name('guru.image.sanggah.show');
    Route::post('/guru/sanggah', [GuruController::class, 'getDetailSanggah'])->name('guru.laporan.sanggah');
    Route::post('/guru/sanggah/update/{id}', [GuruController::class, 'updateSanggah'])->name('guru.laporan.sanggah.upload');
});
