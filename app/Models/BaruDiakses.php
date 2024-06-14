<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BaruDiakses extends Model
{
    use HasFactory;

    protected $table = 'baru_diakses';
    protected $primaryKey = 'id_barudiakses';
    protected $guarded = ['id_barudiakses'];
    public $timestamps = false;

    public function pengguna()
    {
        return $this->belongsTo(User::class, 'pengguna_id', 'id');
    }

    // Definisikan relasi dengan model Pertemuan
    public function pertemuan()
    {
        return $this->belongsTo(Pertemuan::class, 'pertemuan_id', 'id_pertemuan');
    }
}
