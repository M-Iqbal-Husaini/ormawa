<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organisasi extends Model
{
    use HasFactory;

    protected $table = 'organisasis';
    protected $fillable = [
        'logo', 'nama', 'deskripsi', 'kategori','visi', 'misi', 'info_button'

    ];

    public function divisis()
    {
        return $this->hasMany(Divisi::class, 'id_organisasi');
    }

    public function linkWa()
    {
        return $this->hasOne(Link::class, 'id_organisasi');
    }

    public function pendaftaran()
    {
        return $this->hasMany(Pendaftaran::class, 'id_organisasi');
    }

    public function berita()
    {
        return $this->hasMany(Berita::class, 'id_organisasi');
    }
}
