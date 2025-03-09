<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SiswaController extends Controller
{
    public function index(){
        return view('siswa.index');
    }

    public function pageLaporan(){
        $users = User::whereNotIn('role', ['superadmin', 'guru'])->whereNotIn('id', [Auth::user()->id])->pluck('nama', 'id');
        $kategoris = Kategori::all()->pluck('judul', 'id');
        return view('siswa.laporan', compact('users', 'kategoris'));
    }
}
