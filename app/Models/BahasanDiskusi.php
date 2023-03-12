<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BahasanDiskusi extends Model
{
    use HasFactory;

    protected $table = "bahasan_diskusi";
    protected $guarded = ['id'];
}
