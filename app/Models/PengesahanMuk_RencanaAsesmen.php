<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengesahanMuk_RencanaAsesmen extends Model
{
    use HasFactory;

    protected $table = "p_muk_rencana_asesmen";
    protected $guarded = ['id'];
    
}
