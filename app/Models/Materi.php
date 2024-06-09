<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materi extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'materi';
    protected $primaryKey = 'id_materi';
    protected $guarded = ['id_materi'];
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
