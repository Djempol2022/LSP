<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KoreksiJawaban extends Model
{
    use HasFactory;

    protected $table = "koreksi_jawaban";
    protected $guarded = ['id'];

    public function relasi_jadwal_uji_kompetensi()
    {
        return $this->belongsTo(JadwalUjiKompetensi::class, 'jadwal_uji_kompetensi_id', 'id');
    }

    public function relasi_user_asesi()
    {
        return $this->belongsTo(User::class, 'user_asesi_id', 'id');
    }
}
