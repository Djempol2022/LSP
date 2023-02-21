<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HasilUmpanBalik extends Model
{
    use HasFactory;

    protected $table = "hasil_umpan_balik";
    protected $guarded = ['id'];

}
