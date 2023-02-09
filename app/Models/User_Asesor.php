<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_Asesor extends Model
{
    use HasFactory;
    protected $table ='users_asesor';
    protected $guarded =[];

    public function users(){
        return $this->belongsTo(User::class,'users_id', 'id');
    } 
}
