<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TandaTangan extends Model
{
    use HasFactory;
    
    protected $table = "tanda_tangan";
    protected $guarded = ['id'];

    public function relasi_sertifikasi(){
        return $this->belongsTo(Sertifikasi::class, 'sertifikasi_id', 'id');
    }
}
