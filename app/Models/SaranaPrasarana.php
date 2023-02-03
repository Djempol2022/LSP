<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaranaPrasarana extends Model
{
    use HasFactory;

    protected $table = "sarana_prasarana";
    protected $guarded = ['id'];

    public function relasi_sarana_prasarana_sub()
    {
        return $this->hasMany(SaranaPrasaranaSub::class, 'sarana_prasarana_id', 'id');
    }
}
