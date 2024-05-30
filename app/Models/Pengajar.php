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

    // Definisi relasi ke model Kelas
    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id', 'id_kelas');
    }
    
    public function pengguna()
    {
        return $this->belongsTo(User::class, 'pengguna_id', 'id_pengguna');
    }
}
