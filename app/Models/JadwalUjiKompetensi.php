<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalUjiKompetensi extends Model
{
    use HasFactory;

    protected $table = "jadwal_uji_kompetensi";
    protected $guarded = ['id'];

    public function relasi_muk()
    {
        return $this->belongsTo(MateriUjiKompetensi::class, 'muk_id', 'id');
    }

    public function relasi_user_asesor(){
        return $this->belongsTo(AsesorUjiKompetensi::class, 'id', 'jadwal_uji_kompetensi_id');
    }
    
    public function relasi_user_peninjau(){
        return $this->belongsTo(PeninjauUjiKompetensi::class, 'id', 'jadwal_uji_kompetensi_id');
    }

    public function relasi_user_asesi(){
        return $this->belongsTo(AsesiUjiKompetensi::class, 'id', 'jadwal_uji_kompetensi_id');
    }

    public function relasi_pelaksanaan_ujian(){
        return $this->belongsTo(PelaksanaanUjian::class, 'id', 'jadwal_uji_kompetensi_id');
    }

    public function relasi_soal(){
        return $this->belongsTo(Soal::class, 'id', 'jadwal_uji_kompetensi_id')->orderBy('id', 'desc');
    }
}
