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
        return $this->hasOne(UnitKompetensi::class, 'sertifikasi_id', 'id');
    }

    protected function id(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => ucfirst($value),
        );
    }
}
