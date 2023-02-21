<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kebangsaan extends Model
{
    use HasFactory;

    protected $table = "kebangsaan";
    protected $guarded = ['id'];
}
