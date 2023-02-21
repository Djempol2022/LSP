<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KelengkapanPemohon extends Model
{
    use HasFactory;
    protected $table = "kelengkapan_pemohon";
    protected $guarded = ['id'];

    public function relasi_user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
