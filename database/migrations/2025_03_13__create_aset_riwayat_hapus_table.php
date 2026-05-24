<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('aset_riwayat_hapus', function (Blueprint $table) {
            $table->id();
            $table->string('nama_aset');
            $table->integer('jumlah')->default(0);
            $table->string('kondisi')->nullable();
            $table->string('lokasi')->nullable();
            $table->string('gambar')->nullable();
            $table->text('alasan_hapus')->nullable();
            $table->string('dihapus_oleh')->nullable();
            $table->string('tanggal_hapus')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('aset_riwayat_hapus');
    }
};