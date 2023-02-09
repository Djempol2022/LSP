<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class X04BeritaAcara extends Model
{
    use HasFactory;

    protected $table = 'x04_berita_acara';
    protected $guarded = ['id'];

    public function relasi_skema_sertifikasi()
    {
        return $this->belongsTo(SkemaSertifikasi::class, 'skema_sertifikasi_id', 'id');
    }
}
