<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $primaryKey = 'id_kelas';
    protected $guarded = ['id_kelas'];
    public $timestamps = false;

    use HasFactory;

    public function siswa()
    {
        return $this->hasMany(Siswa::class, 'kelas_id', 'id_kelas');
    }

    public function pengajar()
    {
        return $this->hasMany(Pengajar::class, 'kelas_id', 'id_kelas');
    }

    public function pertemuan()
    {
        return $this->hasMany(Pertemuan::class, 'kelas_id', 'id_kelas');
    }
}
