<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use App\Models\Laporan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;

class AdminController extends Controller
{
    public function index(){
        return view('admin.index');
    }

    public function getUsers(){
        $data = User::all();
        //dd($data);
        return view('admin.listuser', ['users' => $data]);
    }

    public function import(Request $request){
        $users = $request->input('users');

        foreach ($users as $user) {
            User::create([
                'id' => $user['id'],
                'nama' => $user['nama'] ?? '',
                'role' => $user['role'] ?? '',
                'poin' => 0,
                'kode_guru' => $user['kode_guru'],
                'password' => bcrypt($user['password'] ?? 'siapem001'),
                'link_dapodik' => $user['link_dapodik']
            ]);
        }

    return redirect()->back()->with('reload', true);
    }

    public function deleteMultiple(Request $request){
        $ids = $request->input('ids');

        if ($ids) {
            User::whereIn('id', $ids)->delete();
            return redirect()->back()->with('success', 'Selected users have been deleted.');
        }

        return redirect()->back()->with('error', 'No users selected.');
    }

    public function getLaporan(){
        $data = DB::table('laporans')
        ->leftJoin('users', 'laporans.kode_terlapor', '=', 'users.id')
        ->leftJoin('kategoris', 'laporans.kategori', '=', 'kategoris.id')
        ->select('laporans.*', 'users.nama as nama_terlapor', 'kategoris.judul as nama_kategori')->get();

        return view('admin.listriwayat', ['users' => $data]);
        dd($data);
    }

    public function getDetailLaporan(Request $request){
        $decryptedID = Crypt::decrypt($request->id_laporan);
        $data = DB::table('laporans')
        ->join('kategoris', 'laporans.kategori', '=', 'kategoris.id')
        ->where('laporans.id', $decryptedID)->select('laporans.*', 'kategoris.judul as nama_kategori')->first();
        return view('admin.detaillaporan', ['data' => $data]);
    }

    public function getKategori(){
        $data = Kategori::all();
        //dd($data);
        return view('admin.listkategori', ['users' => $data]);
    }

    public function importKategori(Request $request){
        $users = $request->input('users');

        foreach ($users as $user) {
            Kategori::create([
                'judul' => $user['judul'] ?? '',
                'poin' => $user['poin'] ?? '',
                'created_at' => now(),
            ]);
        }

    return redirect()->back()->with('reload', true);
    }

    public function deleteMultipleKategori(Request $request){
        $ids = $request->input('ids');

        if ($ids) {
            Kategori::whereIn('id', $ids)->delete();
            return redirect()->back()->with('success', 'Selected category have been deleted.');
        }

        return redirect()->back()->with('error', 'No category selected.');
    }

    public function tolakLaporan($id){
        $laporan = Laporan::where('id', Crypt::decrypt($id))->first();
        $laporan->status = 'ditolak';
        $laporan->save();

        return redirect()->route('admin.laporan');
    }

    public function terimaLaporan($id){
        $laporan = Laporan::where('id', Crypt::decrypt($id))->first();
        $laporan->status = 'diterima';
        $kategori = Kategori::where('id', $laporan->kategori)->first();
        $user = User::where('id', $laporan->kode_terlapor)->first();
        $user->poin =+ $kategori->poin;
        $laporan->save();
        $user->save();

        return redirect()->route('admin.laporan');
    }
}
