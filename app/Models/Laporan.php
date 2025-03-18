<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Laporan extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'kode_pelapor',
        'kode_terlapor',
        'kode_guru',
        'deskripsi',
        'lokasi',
        'sanggah_deskripsi',
        'sanggah_image',
        'tanggal',
        'kategori',
        'image',
        'status',
        'created_at',
    ];

    public function readers(): BelongsToMany{
        return $this->belongsToMany(User::class, 'user_reports')->withTimestamps();
    }
}
