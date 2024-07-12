<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AreaParkir extends Model
{
    use HasFactory;

    // Nama tabel jika berbeda dari default
    protected $table = 'area_parkirs';

    // Kolom yang dapat diisi
    protected $fillable = [
        'nama',
        'kapasitas',
        'keterangan',
        'kampus_id',
    ];

    public $timestamps = false;

    // Relasi dengan tabel Kampus
    public function kampus()
    {
        return $this->belongsTo(Kampus::class, 'kampus_id');
    }
}
