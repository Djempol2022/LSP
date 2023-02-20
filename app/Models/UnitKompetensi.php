<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnitKompetensi extends Model
{
    use HasFactory;
    protected $table = "unit_kompetensi";
    protected $guarded = ['id'];

    public function relasi_sertifikasi()
    {
        return $this->belongsTo(Sertifikasi::class, 'sertifikasi_id', 'id');
    }

    public function relasi_unit_kompetensi_sub()
    {
        return $this->hasMany(UnitKompetensiSub::class, 'unit_kompetensi_id', 'id');
    }
}
