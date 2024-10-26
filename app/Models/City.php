<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
    public function city()
    {
        return $this->hasMany(City::class);
    }

    // Penggunaan $guarded = []; berarti tidak ada atribut yang dilarang untuk diisi secara massal. Ini memungkinkan semua kolom pada tabel diisi secara otomatis dari input pengguna.
    
    protected $guarded = [];
}
