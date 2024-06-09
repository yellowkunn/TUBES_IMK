<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pertemuan extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'pertemuan';
    protected $primaryKey = 'id_pertemuan';
    protected $guarded = ['id_pertemuan'];
    protected $casts = [
        'tanggal_akses' => 'date',
        'tanggal_akses_2' => 'date',
        'batas_tanggal_akses_2' => 'date',
    ];

    public function materi()
    {
        return $this->hasMany(Materi::class, 'pertemuan_id', 'id_pertemuan');
    }
    public function tugas()
    {
        return $this->hasMany(Tugas::class, 'pertemuan_id', 'id_pertemuan');
    }
}
