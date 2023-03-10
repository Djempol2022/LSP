<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DFHadirAsesi extends Model
{
    use HasFactory;

    protected $table = 'df_hadir_asesi';
    protected $guarded = ['id'];
    protected $dates = ['tgl'];
    protected $casts = [
        'waktu' => 'datetime:H:i',
    ];

    public function relasi_skema_sertifikasi()
    {
        return $this->belongsTo(SkemaSertifikasi::class, 'skema_sertifikasi_id');
    }

    public function relasi_df_hadir_asesi_child()
    {
        return $this->hasMany(DFHadirAsesiChild::class, 'df_hadir_asesi_id');
    }
}
