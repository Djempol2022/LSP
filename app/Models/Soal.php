<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Soal extends Model
{
    use HasFactory;

    protected $table = "soal";
    protected $guarded = ['id'];

    public function relasi_jadwal_uji_kompetensi(){
        return $this->belongsTo(JadwalUjiKompetensi::class, 'jadwal_uji_kompetensi_id', 'id');
    }

    public function relasi_jawaban_asesi(){
        return $this->belongsTo(JawabanAsesi::class, 'id', 'soal_id');
    }
}
