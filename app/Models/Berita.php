<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    // Tentukan nama tabel jika berbeda dari pluralisasi standar
    protected $table = 'beritas';

    // Tentukan kolom yang dapat diisi (fillable)
    protected $fillable = [
        'judul',
        'deskripsi',
        'image',
        'penulis',
        'id_organisasi',
    ];

    // Tentukan relasi dengan tabel Organisasi
    public function organisasi()
    {
        return $this->belongsTo(Organisasi::class, 'id_organisasi');
    }
}
