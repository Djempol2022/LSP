<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    use HasFactory;
    protected $table = "users_detail";
    protected $guarded = ['id'];

    // public function relasi_user()
    // {
    //     return $this->belongsTo(User::class, 'user_id', 'id');
    // }
    public function relasi_kualifikasi_pendidikan()
    {
        return $this->belongsTo(KualifikasiPendidikan::class, 'kualifikasi_pendidikan_id', 'id');
    }

    public function relasi_kebangsaan()
    {
        return $this->belongsTo(Kebangsaan::class, 'kebangsaan_id', 'id');
    }
}
