<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusUnitKompetensiAsesi extends Model
{
    use HasFactory;

    protected $table = "status_unit_kompetensi_asesi";
    protected $guarded = ['id'];
}
