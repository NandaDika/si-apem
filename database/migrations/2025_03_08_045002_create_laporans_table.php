<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('laporans', function (Blueprint $table) {
            $table->id();
            $table->uuid('kode_pelapor');
            $table->foreign('kode_pelapor')->references('id')->on('users')->onDelete('cascade');
            $table->uuid('kode_terlapor');
            $table->uuid('kode_guru');
            $table->string('deskripsi');
            $table->string('lokasi');
            $table->date('tanggal');
            $table->string('kategori');
            $table->string('image');
            $table->string('status');
            $table->string('sanggah_deskripsi')->nullable();
            $table->string('sanggah_image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporans');
    }
};
