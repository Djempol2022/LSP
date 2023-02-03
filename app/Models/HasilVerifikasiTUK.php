<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HasilVerifikasiTUK extends Model
{
    use HasFactory;

    protected $table = "hasil_verifikasi_tuk";
    protected $guarded = ['id'];

    public function relasi_skema_sertifikasi()
    {
        return $this->belongsTo(SkemaSertifikasi::class, 'skema_sertifikasi_id', 'id');
    }

    public function relasi_sarana_prasarana()
    {
        return $this->hasMany(SaranaPrasarana::class, 'hasil_verifikasi_tuk_id', 'id');
    }

    public function relasi_penguji_hasil_verifikasi()
    {
        return $this->hasMany(PengujiHasilVerifikasiTUK::class, 'hasil_verifikasi_tuk_id', 'id');
    }
}
