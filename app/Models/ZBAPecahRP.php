<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ZBAPecahRP extends Model
{
    use HasFactory;

    protected $table = 'z_ba_pecah_rp';
    protected $guarded = ['id'];
    protected $dates = ['tgl_tes_tertulis', 'tgl_tes_praktek', 'tgl_rapat'];
    protected $casts = [
        'wkt_mulai_uk' => 'datetime:H:i',
        'wkt_selesai_uk' => 'datetime:H:i',
        'wkt_rapat' => 'datetime:H:i',
    ];

    public function relasi_nama_tuk()
    {
        return $this->belongsTo(NamaTempatUjiKompetensi::class, 'nama_tuk_id', 'id');
    }

    public function relasi_skema_sertifikasi()
    {
        return $this->belongsTo(SkemaSertifikasi::class, 'skema_sertifikasi_id', 'id');
    }

    public function relasi_institusi()
    {
        return $this->belongsTo(Institusi::class, 'institusi_id', 'id');
    }

    public function relasi_nama_jabatan()
    {
        return $this->hasMany(NamaJabatan::class, 'z_ba_pecah_rp_id', 'id');
    }

    public function relasi_bahasan_diskusi()
    {
        return $this->hasMany(BahasanDiskusi::class, 'z_ba_pecah_rp_id', 'id');
    }
}
