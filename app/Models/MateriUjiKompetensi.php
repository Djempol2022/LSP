<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MateriUjiKompetensi extends Model
{
    use HasFactory;

    protected $table = "muk";
    protected $guarded = ['id'];

    public function relasi_jurusan()
    {
        return $this->belongsTo(Jurusan::class, 'jurusan_id', 'id');
    }

    public function relasi_jadwal_uji_kompetensi()
    {
        return $this->belongsTo(JadwalUjiKompetensi::class, 'id', 'muk_id');
    }
}
