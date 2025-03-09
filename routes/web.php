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
    Route::get('admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('admin/user', [AdminController::class, 'getUsers']);
    Route::post('/users/import', [AdminController::class, 'import'])->name('users.import');
    Route::delete('/users/delete-multiple', [AdminController::class, 'deleteMultiple'])->name('users.deleteMultiple');
});

Route::middleware(['auth', 'role:siswa'])->group(function(){
    Route::get('/siswa/dashboard', [SiswaController::class, 'index'])->name('siswa.dashboard');
    Route::get('/siswa/lapor', [SiswaController::class, 'pageLaporan'])->name('siswa.lapor');
    Route::post('/siswa/lapor/submit', [SiswaController::class, 'submitLaporan'])->name('siswa.laporan.submit');
});
