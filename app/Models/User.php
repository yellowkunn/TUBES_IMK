<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $primaryKey = 'id_pengguna';
    protected $guarded = ['id_pengguna'];
    public $timestamps = false;

    public function pengajar()
    {
        return $this->hasOne(Pengajar::class, 'pengguna_id', 'id_pengguna');
    }

    public function siswa()
    {
        return $this->hasOne(Siswa::class, 'pengguna_id', 'id_pengguna');
    }

    public function biodataSiswa()
    {
        return $this->hasOne(Biodata_Siswa::class, 'pengguna_id', 'id_pengguna');
    }

    public function biodataPengajar()
    {
        return $this->hasOne(Biodata_Pengajar::class, 'pengguna_id', 'id_pengguna');
    }

    public function notifications()
    {
        return $this->hasMany(Notification::class, 'pengguna_id', 'id_pengguna');
    }

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
}
