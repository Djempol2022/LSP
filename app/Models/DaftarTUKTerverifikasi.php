<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DaftarTUKTerverifikasi extends Model
{
    use HasFactory;

    protected $table = 'df_tuk_terverifikasi';
    protected $guarded = ['id'];
}
