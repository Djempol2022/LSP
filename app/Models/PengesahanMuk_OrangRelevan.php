<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengesahanMuk_OrangRelevan extends Model
{
    use HasFactory;

    protected $table = "p_muk_orang_relevan";
    protected $guarded = ['id'];
}
