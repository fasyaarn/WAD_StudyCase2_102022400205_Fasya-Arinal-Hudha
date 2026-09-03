<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sample extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode_sampel',
        'nama_sampel',
        'jenis_sampel',
        'jumlah_titik',
        'biaya_per_titik',
        'status_uji',
        'catatan_kondisi',
    ];

    protected $casts = [
        'jumlah_titik' => 'integer',
        'biaya_per_titik' => 'integer',
    ];
}
