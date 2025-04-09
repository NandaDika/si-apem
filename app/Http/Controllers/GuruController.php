<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Laporan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;

class GuruController extends Controller
{
    public function index(){
        $jumlahSiswa = User::where('kode_guru', Auth::id())->count();
        $jumlahLaporan = Laporan::where('kode_guru', Auth::id())->count();
        return view('guru.index', ['jumlahSiswa' => $jumlahSiswa, 'jumlahLaporan' => $jumlahLaporan]);
    }

    public function getLaporan(){
        $data = DB::table('laporans')
        ->leftJoin('users', 'laporans.kode_terlapor', '=', 'users.id')
        ->leftJoin('kategoris', 'laporans.kategori', '=', 'kategoris.id')->where('laporans.kode_guru', '=', Auth::id())
        ->select('laporans.*', 'users.nama as nama_terlapor', 'kategoris.judul as nama_kategori')->get();

        return view('guru.listriwayat', ['users' => $data]);
        dd($data);
    }

    public function getDetailLaporan(Request $request){
        $decryptedID = Crypt::decrypt($request->id_laporan);
        $data = DB::table('laporans')
        ->join('kategoris', 'laporans.kategori', '=', 'kategoris.id')
        ->where('laporans.id', $decryptedID)->select('laporans.*', 'kategoris.judul as nama_kategori')->first();
        return view('guru.detaillaporan', ['data' => $data]);
    }
}
