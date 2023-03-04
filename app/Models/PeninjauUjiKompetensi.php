<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeninjauUjiKompetensi extends Model
{
    use HasFactory;
    protected $table = "peninjau_uji_kompetensi";
    protected $guarded = ['id'];

    public function relasi_jadwal_uji_kompetensi()
    {
        return $this->belongsTo(JadwalUjiKompetensi::class, 'jadwal_uji_kompetensi_id', 'id');
    }
    public function relasi_user_peninjau_detail()
    {
        return $this->belongsTo(User::class, 'user_peninjau_id', 'id');
    }
}
