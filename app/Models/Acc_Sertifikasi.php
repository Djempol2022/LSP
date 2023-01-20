<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Acc_Sertifikasi extends Model
{
    use HasFactory;
    protected $table ='acc_sertifikasi';
    protected $guarded =[];

    public function users(){
        return $this->belongsTo(User::class,'users_id', 'id');
    } 
    public function sertifikasi(){
        return $this->belongsTo(Sertifikasi::class,'sertifikasi_id', 'id');
    } 
}
