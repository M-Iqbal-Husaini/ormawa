<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    use HasFactory;

    protected $table = 'pendaftarans';

    protected $fillable = [
        'nama',
        'nim',
        'email',
        'no_hp',
        'alamat',
        'prodi',
        'jurusan',
        'jabatan',
        'id_divisi',
        'id_organisasi',
        'id_user',
        'status',
        'motivasi',
        'tahun_kepengurusan',
        'cv',
        'status_daftar',
    ];


    public function divisi()
    {
        return $this->belongsTo(Divisi::class, 'id_divisi');
    }

    public function organisasi()
    {
        return $this->belongsTo(Organisasi::class, 'id_organisasi');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
