<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Biodata_Pengajar extends Model
{
    use HasFactory;
    protected $table = 'biodata_pengajar';
    protected $primaryKey = 'id_biodata_pengajar';
    protected $guarded = ['id_biodata_pengajar'];
}
