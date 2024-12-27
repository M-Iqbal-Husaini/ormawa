<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ormawa extends Authenticatable
{
    use HasFactory;

    protected $table = 'ormawas';
    protected $fillable = [
        'id_organisasi', 'name', 'username', 'email', 'password',
    ];

    // Relasi ke tabel organisasi (jika ada)
    public function organisasi()
    {
        return $this->belongsTo(Organisasi::class, 'id_organisasi');
    }
}
