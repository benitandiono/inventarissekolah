<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Aset extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = [
        'gambar',
        'nama_aset',
        'jumlah',
        'kondisi',
        'lokasi'
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['nama_aset', 'jumlah', 'kondisi', 'lokasi']) // abaikan path gambar
            ->logOnlyDirty()
            ->useLogName('aset')
            ->setDescriptionForEvent(fn ($event) => "aset {$event}")
            ->dontSubmitEmptyLogs();
    }
}
