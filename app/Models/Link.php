<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    use HasFactory;

    protected $table = 'wa_links';
    protected $fillable = [
        'id_organisasi', 'link'

    ];

    public function organisasi()
    {
        return $this->belongsTo(Organisasi::class, 'id_organisasi');
    }
}
