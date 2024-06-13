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

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id', 'id_kelas');
    }
}
