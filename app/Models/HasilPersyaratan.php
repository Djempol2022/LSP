<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HasilPersyaratan extends Model
{
    use HasFactory;

    protected $table = "hasil_persyaratan";
    protected $guarded = ['id'];

    public function relasi_user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
