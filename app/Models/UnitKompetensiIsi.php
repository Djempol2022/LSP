<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnitKompetensiIsi extends Model
{
    use HasFactory;
    protected $table = "unit_kompetensi_isi";
    protected $guarded = ['id'];


    public function relasi_unit_kompetensi_sub(){
        return $this->belongsTo(UnitKompetensiSub::class, 'unit_kompetensi_sub_id', 'id');
    }

}
