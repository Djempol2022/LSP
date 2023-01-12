<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalUjiKompetensi extends Model
{
    use HasFactory;

    protected $table = "jadwal_uji_kompetensi";
    protected $guarded = ['id'];

    public function relasiMuk()
    {
        return $this->belongsTo(MateriUjiKompetensi::class, 'muk_id', 'id');
    }
}
