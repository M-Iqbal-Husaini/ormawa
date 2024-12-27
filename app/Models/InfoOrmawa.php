<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InfoOrmawa extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_organisasi', 'tahun_kepengurusan', 'id_ketum_organisasi', 'id_waketum_organisasi', 'id_sekretaris', 'id_bendahara'

    ];
}

