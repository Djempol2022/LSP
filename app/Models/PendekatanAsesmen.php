<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PendekatanAsesmen extends Model
{
    use HasFactory;

    protected $table = "p_muk_pendekatan_asesmen";
    protected $guarded = ['id'];
}
