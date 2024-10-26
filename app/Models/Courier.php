<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Courier extends Model
{
    use HasFactory;

    // Penggunaan $guarded = []; berarti tidak ada atribut yang dilarang untuk diisi secara massal. Ini memungkinkan semua kolom pada tabel diisi secara otomatis dari input pengguna.
    
    protected $guarded = [];
}
