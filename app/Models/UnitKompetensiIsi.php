<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnitKompetensiIsi extends Model
{
    use HasFactory;
    protected $table = "unit_kompetensi_isi";
    protected $guarded = ['id'];

}
