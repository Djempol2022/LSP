<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class X03STVerifikasiTUK extends Model
{
    use HasFactory;

    protected $table = 'x03_st_verifikasi_tuk';
    protected $guarded = ['id'];
    protected $dates = ['tanggal_ditetapkan', 'tanggal_mulai', 'tanggal_selesai'];
    protected $casts = [
        'waktu' => 'datetime:H:i',
    ];

    public function relasi_nama_tuk()
    {
        return $this->belongsTo(NamaTempatUjiKompetensi::class, 'nama_tuk_id', 'id');
    }

    public function relasi_nama_jabatan()
    {
        return $this->hasMany(NamaJabatan::class, 'x03_st_verifikasi_tuk_id', 'id');
    }
}
