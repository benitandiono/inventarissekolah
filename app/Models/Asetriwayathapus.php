<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AsetRiwayatHapus extends Model
{
    use HasFactory;

    protected $table = 'aset_riwayat_hapus';

    protected $fillable = [
        'nama_aset',
        'jumlah',
        'kondisi',
        'lokasi',
        'gambar',
        'alasan_hapus',
        'dihapus_oleh',
        'tanggal_hapus',
    ];
}