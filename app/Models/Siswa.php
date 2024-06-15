<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $table = 'siswa';
    protected $primaryKey = 'id_siswa';
    protected $guarded = ['id_siswa'];
    public $timestamps = false;


    public function pengguna()
    {
        return $this->belongsTo(User::class, 'pengguna_id', 'id_pengguna');
    }
    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id', 'id_kelas');
    }

    public function absensi()
    {
        return $this->hasMany(Absensi::class, 'siswa_id', 'id_siswa');
    }
    
}