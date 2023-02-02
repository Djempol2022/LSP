<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnitKompetensi extends Model
{
    use HasFactory;
    protected $table = "unit_kompetensi";
    protected $guarded = ['id'];

    public function relasi_skema_sertifikasi()
    {
        return $this->belongsTo(SkemaSertifikasi::class, 'skema_sertifikasi_id', 'id');
    }

    public function relasi_unit_kompetensi_sub()
    {
        return $this->belongsTo(UnitKompetensiSub::class, 'id', 'unit_kompetensi_id');
    }
}
