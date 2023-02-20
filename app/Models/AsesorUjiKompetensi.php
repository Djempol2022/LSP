<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AsesorUjiKompetensi extends Model
{
    use HasFactory;
    protected $table = "asesor_uji_kompetensi";
    protected $guarded = ['id'];

    public function relasi_jadwal_uji_kompetensi()
    {
        return $this->belongsTo(JadwalUjiKompetensi::class, 'jadwal_uji_kompetensi_id', 'id');
    }
    public function relasi_user_asesor()
    {
        return $this->belongsTo(User::class, 'user_asesor_id', 'id');
    }

    public function relasi_asesi_uji_kompetensi()
    {
        return $this->hasMany(AsesiUjiKompetensi::class, 'jadwal_uji_kompetensi_id', 'jadwal_uji_kompetensi_id');
    }
}
