<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnitKompetensiSub extends Model
{
    use HasFactory;
    protected $table = "unit_kompetensi_sub";
    protected $guarded = ['id'];
    
    public function relasi_unit_kompetensi_isi(){
        return $this->hasOne(UnitKompetensiIsi::class, 'unit_kompetensi_sub_id', 'id');
    }
}
