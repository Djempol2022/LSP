<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PelaksanaanUjian extends Model
{
    use HasFactory;
    protected $table = "pelaksanaan_ujian";
    protected $guarded = ['id'];
    protected $dates = ['tanggal'];

    public function relasi_jadwal_uji_kompetensi()
    {
        return $this->belongsTo(JadwalUjiKompetensi::class, 'jadwal_uji_kompetensi_id', 'id');
    }

    public function relasi_tuk()
    {
        return $this->belongsTo(NamaTempatUjiKompetensi::class, 'tuk_id', 'id');
    }
}
