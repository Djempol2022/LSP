<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class STVerifikasiTUK extends Model
{
    use HasFactory;

    protected $table = 'st_verifikasi_tuk';
    protected $guarded = ['id'];
    protected $dates = ['tanggal_dilaksanakan', 'tanggal_ditetapkan'];

    public function relasi_skema_sertifikasi()
    {
        return $this->belongsTo(SkemaSertifikasi::class, 'skema_sertifikasi_id', 'id');
    }

    public function relasi_nama_jabatan()
    {
        return $this->hasMany(NamaJabatan::class, 'st_verifikasi_tuk_id', 'id');
    }
}
