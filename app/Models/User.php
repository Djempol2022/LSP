<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Jurusan;
use App\Models\Sekolah;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = ['id'];
    protected $dates = ['tanggal_lahir'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function relasi_role()
    {
        return $this->belongsTo(Role::class, 'role_id', 'id');
    }
    public function relasi_institusi()
    {
        return $this->belongsTo(Institusi::class, 'institusi_id', 'id');
    }
    public function relasi_jurusan()
    {
        return $this->belongsTo(Jurusan::class, 'jurusan_id', 'id');
    }

    public function relasi_user_detail()
    {
        return $this->belongsTo(UserDetail::class, 'id', 'user_id');
    }

    public function relasi_pekerjaan()
    {
        return $this->belongsTo(Pekerjaan::class, 'id', 'user_id');
    }

    public function relasi_sertifikasi()
    {
        return $this->belongsTo(Sertifikasi::class, 'id', 'user_id');
    }

    public function relasi_asesmen_mandiri()
    {
        return $this->belongsTo(AsesmenMandiri::class, 'id', 'user_asesi_id');
    }

    public function relasi_unit_kompetensi()
    {
        return $this->belongsTo(UnitKompetensi::class, 'id', 'user_id');
    }

    public function relasi_kelengkapan_pemohon()
    {
        return $this->belongsTo(KelengkapanPemohon::class, 'id', 'user_id');
    }

    public function relasi_asesor_uji_kompetensi()
    {
        return $this->hasMany(AsesorUjiKompetensi::class, 'user_asesor_id', 'id');
    }

    public function relasi_asesi_uji_kompetensi()
    {
        return $this->belongsTo(AsesiUjiKompetensi::class, 'id', 'user_asesi_id');
    }

    public function relasi_skema_sertifikasi()
    {
        return $this->belongsTo(SkemaSertifikasi::class, 'jurusan_id', 'jurusan_id');
    }

    public function relasi_koreksi_jawaban()
    {
        return $this->belongsTo(KoreksiJawaban::class, 'id', 'user_asesi_id');
    }
    public function relasi_user_asesi_ukom()
    {
        return $this->belongsTo(AsesiUjiKompetensi::class, 'id', 'user_asesi_id');
    }
}
