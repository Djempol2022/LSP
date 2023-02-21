<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AsesmenMandiri extends Model
{
    use HasFactory;

    protected $table = "asesmen_mandiri";
    protected $guarded = ['id'];

    public function relasi_user_asesi()
    {
        return $this->belongsTo(User::class, 'user_asesi_id', 'id');
    }

    public function relasi_user_asesor()
    {
        return $this->belongsTo(User::class, 'user_asesor_id', 'id');
    }
}
