<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SKPenetapanTUK extends Model
{
    use HasFactory;

    protected $table = 'sk_penetapan_tuk';
    protected $guarded = ['id'];
    protected $dates = ['tanggal_ditetapkan'];

    public function relasi_sk_penetapan_tuk_child()
    {
        return $this->hasMany(SKPenetapanTUKChild::class, 'sk_penetapan_tuk_id', 'id');
    }
}
