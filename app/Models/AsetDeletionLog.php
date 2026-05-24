<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AsetDeletionLog extends Model
{
    use HasFactory;

    protected $table = 'aset_deletion_logs';

    protected $fillable = [
        'nama_aset',
        'jumlah',
        'kondisi',
        'lokasi',
        'gambar',
        'alasan_hapus',
        'deleted_by',
        'deleted_by_name',
        'deleted_at_log',
    ];

    protected $casts = [
        'deleted_at_log' => 'datetime',
    ];

    /**
     * Relasi ke User yang melakukan penghapusan.
     */
    public function deletedByUser()
    {
        return $this->belongsTo(User::class, 'deleted_by');
    }
}