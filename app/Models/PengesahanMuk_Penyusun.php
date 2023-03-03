<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengesahanMuk_Penyusun extends Model
{
    use HasFactory;

    protected $table = "p_muk_penyusun";
    protected $guarded = ['id'];
}
