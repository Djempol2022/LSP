<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DaftarTUKTerverifikasiChild extends Model
{
    use HasFactory;

    protected $table = 'df_tuk_terverifikasi_child';
    protected $guarded = ['id'];
}
