<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DaftarTUKTerverifikasi extends Model
{
    use HasFactory;

    protected $table = 'df_tuk_terverifikasi';
    protected $guarded = ['id'];
    protected $dates = ['tanggal_ditetapkan'];

    public function relasi_daftar_tuk_terverifikasi_child()
    {
        return $this->hasMany(DaftarTUKTerverifikasiChild::class, 'df_tuk_terverifikasi_id', 'id');
    }
}
