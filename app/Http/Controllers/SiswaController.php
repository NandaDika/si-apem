<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use App\Models\Laporan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class SiswaController extends Controller
{
    public function index()
{
    // Ambil user yang sedang login
    $siswa = Auth::user();

    // Cari nama guru berdasarkan kode_guru
    $guru = User::where('id', $siswa->kode_guru)->first();
    $namaGuru = $guru ? $guru->nama : '-';

    // Hitung laporan sebagai pelapor dan terlapor
    $jumlahMelaporkan = Laporan::where('kode_pelapor', $siswa->id)->count();
    $jumlahDiterlapor = Laporan::where('kode_terlapor', $siswa->id)->count();

    return view('siswa.index', [
        'siswa' => $siswa,
        'namaGuru' => $namaGuru,
        'jumlahMelaporkan' => $jumlahMelaporkan,
        'jumlahDiterlapor' => $jumlahDiterlapor,
    ]);
}

    public function pageLaporan(){
        $users = User::whereNotIn('role', ['superadmin', 'guru', 'admin'])->whereNotIn('id', [Auth::user()->id])->pluck('nama', 'id');
        $kategoris = Kategori::all()->pluck('judul', 'id');
        return view('siswa.laporan', compact('users', 'kategoris'));
    }

    public function submitLaporan(Request $request){
        //dd($request);
        $terlapor = User::where('id', Crypt::decrypt($request->id_pelaku))->first();
        $user = Auth::user();
        $request->validate([
            'file' => 'required|file',
        ]);
        $errors = [];



        $file = $request->file('file');
        $mime = $file->getMimeType();
        $sizeInKb = $file->getSize() / 1024;

        if((str_starts_with($mime, 'image/') || $mime === 'application/pdf') && $sizeInKb > 1024){
            return back()->with('message', $file->getClientOriginalName() . ' Melebihi 1MB.');
        }else if(str_starts_with($mime, 'video/') && $sizeInKb > 10240){
            return back()->with('message', $file->getClientOriginalName() . ' Melebihi 10MB.');
        }

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
            'tanggal' => $request->tanggal,
            'lokasi' => $request->lokasi,
            'status' => 'diproses',
            'created_at' => now(),
        ]);

        if($data){
            Storage::put('/private/bukti/' . $filename, $encryptedFile);
        }


        return redirect()->back()->with('message', 'Data berhasil ditambahkan');
    }

    public function pageRiwayatLaporan(){
        $data = DB::table('laporans')
        ->join('users', 'laporans.kode_terlapor', '=', 'users.id')
        ->join('kategoris', 'laporans.kategori', '=', 'kategoris.id')->where('laporans.kode_pelapor', Auth::id())
        ->select('laporans.*', 'users.nama as nama_terlapor', 'kategoris.judul as nama_kategori')->get();
        //dd($data);
        return view('siswa.listriwayat', ['users' => $data]);
    }

    public function pageDilaporkan(){
        $data = DB::table('laporans')
        ->join('users', 'laporans.kode_terlapor', '=', 'users.id')
        ->join('kategoris', 'laporans.kategori', '=', 'kategoris.id')->where('laporans.kode_terlapor', Auth::id())
        ->select('laporans.*', 'users.nama as nama_terlapor', 'kategoris.judul as nama_kategori')->get();
        //dd($data);
        return view('siswa.dilaporkan', ['users' => $data]);
    }

    public function getDetailLaporan(Request $request){
        $decryptedID = Crypt::decrypt($request->id_laporan);
        $data = DB::table('laporans')
        ->join('kategoris', 'laporans.kategori', '=', 'kategoris.id')
        ->where('laporans.id', $decryptedID)->select('laporans.*', 'kategoris.judul as nama_kategori')->first();
        $filedata = strtolower(pathinfo($data->image, PATHINFO_EXTENSION));
        if (in_array($filedata, ['jpg', 'jpeg', 'png'])) {
            // Handle image preview
            $data->contentType = 'image/jpeg';
        } elseif ($filedata === 'pdf') {
            // Handle PDF preview
            $data->contentType = 'application/pdf';
        } elseif ($filedata === 'mp4') {
            // Handle video preview
            $data->contentType = 'video/mp4';
        } else {
            // Unknown or unsupported file type
            abort(415, 'Unsupported Media Type');
        }

        if ($data->sanggah_image != NULL) {
            $filedata2 = strtolower(pathinfo($data->sanggah_image, PATHINFO_EXTENSION));
            if (in_array($filedata2, ['jpg', 'jpeg', 'png'])) {
                // Handle image preview
                $data->contentType2 = 'image/jpeg';
            } elseif ($filedata2 === 'pdf') {
                // Handle PDF preview
                $data->contentType2 = 'application/pdf';
            } elseif ($filedata2 === 'mp4') {
                // Handle video preview
                $data->contentType2 = 'video/mp4';
            } else {
                // Unknown or unsupported file type
                abort(415, 'Unsupported Media Type');
            }
        }

        return view('siswa.detaillaporan', ['data' => $data]);
    }

    public function showEncryptedImage($id){
        $decryptedID = Crypt::decrypt($id);
        $data = Laporan::where('id', $decryptedID)->first();
        $path = 'private/bukti/' . $data->image;
        if (!Storage::exists($path)) {
            abort(404, 'File not found');
        }
        $encryptedContent = Storage::get($path);
        $decryptedContent = Crypt::decrypt($encryptedContent);

        $mimeType = finfo_buffer(finfo_open(), $decryptedContent, FILEINFO_MIME_TYPE);

        return response($decryptedContent)
        ->header('Content-Type', $mimeType);
    }

    public function showEncryptedImage2($id){
        $decryptedID = Crypt::decrypt($id);
        $data = Laporan::where('id', $decryptedID)->first();
        $path = 'private/bukti/' . $data->sanggah_image;
        if (!Storage::exists($path)) {
            abort(404, 'File not found');
        }
        $encryptedContent = Storage::get($path);
        $decryptedContent = Crypt::decrypt($encryptedContent);

        $mimeType = finfo_buffer(finfo_open(), $decryptedContent, FILEINFO_MIME_TYPE);

        return response($decryptedContent)
        ->header('Content-Type', $mimeType);
    }

    public function getDetailSanggah(Request $request){
        $decryptedID = Crypt::decrypt($request->id_laporan);
        $data = DB::table('laporans')
        ->join('kategoris', 'laporans.kategori', '=', 'kategoris.id')
        ->where('laporans.id', $decryptedID)->select('laporans.*', 'kategoris.judul as nama_kategori')->first();

        $filedata = strtolower(pathinfo($data->image, PATHINFO_EXTENSION));
        if (in_array($filedata, ['jpg', 'jpeg', 'png'])) {
            // Handle image preview
            $data->contentType = 'image/jpeg';
        } elseif ($filedata === 'pdf') {
            // Handle PDF preview
            $data->contentType = 'application/pdf';
        } elseif ($filedata === 'mp4') {
            // Handle video preview
            $data->contentType = 'video/mp4';
        } else {
            // Unknown or unsupported file type
            abort(415, 'Unsupported Media Type');
        }
        return view('siswa.detailsanggah', ['data' => $data]);
    }

    public function updateSanggah(Request $request, $id){
        $laporan = Laporan::find(Crypt::decrypt($id));


        $request->validate([
            'file' => 'required|file',
        ]);

        $file = $request->file('file');
        $mime = $file->getMimeType();
        $sizeInKb = $file->getSize() / 1024;

        if((str_starts_with($mime, 'image/') || $mime === 'application/pdf') && $sizeInKb > 1024){
            return back()->with('message', $file->getClientOriginalName() . ' Melebihi 1MB.');
        }else if(str_starts_with($mime, 'video/') && $sizeInKb > 10240){
            return back()->with('message', $file->getClientOriginalName() . ' Melebihi 10MB.');
        }

        $encryptedFile = Crypt::encrypt(file_get_contents($file));
        $filename = $file->hashName();
        Storage::put('/private/bukti/' . $filename, $encryptedFile);

        $laporan->sanggah_deskripsi = $request->deskripsi_sanggah;
        $laporan->sanggah_image = $filename;
        $laporan->status = 'disanggah';

        $updateData = $laporan->save();
        if($updateData){
            Storage::put('/private/bukti/' . $filename, $encryptedFile);
        }

        return redirect('/siswa/laporan')->with('message', 'Laporan berhasil disanggah');
    }
}
