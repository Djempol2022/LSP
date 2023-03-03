<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengesahanMuk_Validator extends Model
{
    use HasFactory;

    protected $table = "p_muk_validator";
    protected $guarded = ['id'];
}
