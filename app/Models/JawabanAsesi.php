<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JawabanAsesi extends Model
{
    use HasFactory;

    protected $table = "jawaban_asesi";
    protected $guarded = ['id'];

    public function relasi_soal(){
        return $this->belongsTo(Soal::class, 'soal_id', 'id');
    }
}
