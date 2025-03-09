<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use App\Models\Laporan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;

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

    public function submitLaporan(Request $request){

        $terlapor = User::where('id', $request->id_pelaku)->first();
        $user = Auth::user();
        $request->validate([
            'file' => 'required|image|mimes:jpg,png,jpeg,gif|max:2048',
        ]);

        $file = $request->file('file');

        $encryptedFile = Crypt::encrypt(file_get_contents($file));
        $filename = $file->hashName();
        Storage::put('/private/bukti/' . $filename, $encryptedFile);

        $data = Laporan::create([
            'kode_pelapor' => $user->id,
            'kode_terlapor' => $terlapor->id,
            'kode_guru' => $terlapor->kode_guru,
            'deskripsi' => $request->deskripsi,
            'kategori' => $request->kategori,
            'image' => $filename,
            'status' => 'diproses',
            'created_at' => now(),
        ]);

        if($data){
            Storage::put('/private/bukti/' . $filename, $encryptedFile);
        }


        return redirect()->back()->with('message', 'Data berhasil ditambahkan');
    }
}
