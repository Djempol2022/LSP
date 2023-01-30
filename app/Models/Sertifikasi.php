<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sertifikasi extends Model
{
    use HasFactory;
    protected $table = "sertifikasi";
    protected $guarded = ['id'];

    public function relasi_user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function relasi_unit_kompetensi(){
        return $this->belongsTo(UnitKompetensi::class, 'id', 'skema_sertifikasi_id');
    }

    public function relasi_tanda_tangan_admin(){
        return $this->belongsTo(TandaTangan::class, 'id', 'sertifikasi_id');
    }
}
