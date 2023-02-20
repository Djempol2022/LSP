<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaranaPrasaranaSub extends Model
{
    use HasFactory;

    protected $table = "sarana_prasarana_sub";
    protected $guarded = ['id'];

    public function relasi_sarana_prasarana_sub2()
    {
        return $this->hasMany(SaranaPrasaranaSub2::class, 'sarana_prasarana_sub_id', 'id');
    }
}
