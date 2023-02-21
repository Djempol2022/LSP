<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    use HasFactory;

    protected $table = "jurusan";
    protected $guarded = ['id'];

    public function relasi_skema_sertifikasi(){
        return $this->belongsTo(SkemaSertifikasi::class, 'id', 'jurusan_id');
    }
}
