<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UmpanBalikKomponen extends Model
{
    use HasFactory;
    protected $table = "umpan_balik_komponen";
    protected $guarded = ['id'];
}
