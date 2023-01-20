<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sertifikasi extends Model
{
    use HasFactory;
    protected $table = "sertifikasi";
    protected $guarded = ['id'];

    public function relasi_user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function relasi_detail_jadwal(){
        return $this->belongsTo(Jadwal);
    }
}
