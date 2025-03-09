<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'kode_pelapor',
        'kode_terlapor',
        'kode_guru',
        'deskripsi',
        'kategori',
        'image',
        'status',
        'created_at',
    ];
}
