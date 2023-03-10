<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SkemaSertifikasi extends Model
{
    use HasFactory;

    protected $table = 'skema_sertifikasi';
    protected $guarded = ['id'];

    public function relasi_jurusan()
    {
        return $this->belongsTo(Jurusan::class, 'jurusan_id', 'id');
    }

    public function relasi_unit_kompetensi()
    {
        return $this->hasMany(UnitKompetensi::class, 'skema_sertifikasi_id', 'id');
    }
}
