<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kampus extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama', 'alamat', 'latitude', 'longitude',
    ];

    public $timestamps = false;

    // Relasi dengan tabel AreaParkir
    public function areaParkirs()
    {
        return $this->hasMany(AreaParkir::class, 'kampus_id');
    }
}