<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tugas extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'tugas';
    protected $primaryKey = 'id_tugas';
    protected $guarded = ['id_tugas'];
    protected $casts = [
        'tanggal_akses' => 'date',
        'tanggal_akses_2' => 'date',
        'batas_tanggal_akses_2' => 'date',
    ];

    public function pertemuan()
    {
        return $this->belongsTo(Pertemuan::class, 'pertemuan_id', 'id_pertemuan');
    }
}
