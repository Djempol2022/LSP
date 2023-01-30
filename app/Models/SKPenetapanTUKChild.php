<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SKPenetapanTUKChild extends Model
{
    use HasFactory;

    protected $table = 'sk_penetapan_tuk_child';
    protected $guarded = ['id'];

    public function relasi_nama_tuk()
    {
        return $this->belongsTo(NamaTempatUjiKompetensi::class, 'nama_tuk_id', 'id');
    }

    public function relasi_skema_sertifikasi()
    {
        return $this->belongsTo(SkemaSertifikasi::class, 'skema_sertifikasi_id', 'id');
    }
}
