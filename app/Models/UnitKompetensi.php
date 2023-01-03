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
}
