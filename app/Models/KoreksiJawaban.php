<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KoreksiJawaban extends Model
{
    use HasFactory;

    protected $table = "koreksi_jawaban";
    protected $guarded = ['id'];
}
