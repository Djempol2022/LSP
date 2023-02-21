<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NamaTempatUjiKompetensi extends Model
{
    use HasFactory;

    protected $table = 'nama_tuk';
    protected $guarded = ['id'];
}
