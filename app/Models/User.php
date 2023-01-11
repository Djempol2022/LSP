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
    
    public function relasiRole()
    {
        return $this->belongsTo(Role::class, 'role_id', 'id');
    }
    public function relasiInstitusi()
    {
        return $this->belongsTo(Institusi::class, 'institusi_id', 'id');
    }
    public function relasiJurusan()
    {
        return $this->belongsTo(Jurusan::class, 'jurusan_id', 'id');
    }
}
