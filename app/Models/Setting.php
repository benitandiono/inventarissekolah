<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
        'nama_instansi',
        'logo',
        'nama_kepsek',
        'nip_kepsek',
        'nama_waka',
        'nuptk_waka',
    ];
}