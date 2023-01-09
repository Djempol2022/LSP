<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MateriUjiKompetensi extends Model
{
    use HasFactory;

    protected $table = "muk";
    protected $guarded = ['id'];

    public function jurusanRelasi()
    {
        return $this->belongsTo(Jurusan::class, 'jurusan_id', 'id');
    }
}
