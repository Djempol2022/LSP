<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DFHadirAsesiChild extends Model
{
    use HasFactory;

    protected $table = 'df_hadir_asesi_child';
    protected $guarded = ['id'];

    public function relasi_institusi()
    {
        return $this->belongsTo(Institusi::class, 'institusi_id');
    }
}
