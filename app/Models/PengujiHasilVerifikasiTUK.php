<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengujiHasilVerifikasiTUK extends Model
{
    use HasFactory;

    protected $table = "penguji_hasil_verifikasi_tuk";
    protected $guarded = ['id'];
}
