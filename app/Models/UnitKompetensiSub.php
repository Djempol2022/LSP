<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnitKompetensiSub extends Model
{
    use HasFactory;
    protected $table = "unit_kompetensi_sub";
    protected $guarded = ['id'];
    
    public function relasi_unit_kompetensi(){
        return $this->belongsTo(UnitKompetensi::class, 'unit_kompetensi_id', 'id');
    }

    public function relasi_unit_kompetensi_isi(){
        return $this->belongsTo(UnitKompetensiIsi::class, 'id', 'unit_kompetensi_sub_id');
    }
}
