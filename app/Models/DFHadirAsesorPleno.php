<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DFHadirAsesorPleno extends Model
{
    use HasFactory;

    protected $table = 'df_hadir_asesor_pleno';
    protected $guarded = ['id'];
    protected $dates = ['tgl', 'wkt_mulai', 'wkt_selesai', 'thn_ajaran'];

    public function relasi_nama_jabatan()
    {
        return $this->hasMany(NamaJabatan::class, 'df_hadir_asesor_pleno_id', 'id');
    }
}
