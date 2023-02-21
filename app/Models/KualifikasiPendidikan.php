<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KualifikasiPendidikan extends Model
{
    use HasFactory;

    protected $table = "kualifikasi_pendidikan";
    protected $guarded = ['id'];
}
