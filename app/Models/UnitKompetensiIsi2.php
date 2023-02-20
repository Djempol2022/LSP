<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnitKompetensiIsi2 extends Model
{
    use HasFactory;

    protected $table = "unit_kompetensi_isi_2";
    protected $guarded = ['id'];


    public function relasi_unit_kompetensi_isi(){
        return $this->belongsTo(UnitKompetensiIsi::class, 'unit_kompetensi_isi_id', 'id');
    }

    
}
