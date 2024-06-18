<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengajar extends Model
{
    use HasFactory;

    protected $table = 'pengajar';
    protected $primaryKey = 'id_pengajar';
    protected $guarded = ['id_pengajar'];
    public $timestamps = false;

    // Definisi relasi ke model Kelas
    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id', 'id_kelas');
    }
    
    public function pengguna()
    {
        return $this->belongsTo(User::class, 'pengguna_id', 'id_pengguna');
    }

    public function pertemuan()
    {
        return $this->hasMany(Pertemuan::class, 'pengajar_id', 'id_pengajar');
    }

    public function kalender_pendidikan()
    {
        return $this->belongsTo(Kalender_pendidikan::class, 'kalender_pendidikan_id', 'id_kalender_pendidikan');
    }
}
