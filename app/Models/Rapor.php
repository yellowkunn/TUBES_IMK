<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rapor extends Model
{
    use HasFactory;
    protected $table = 'rapor';
    protected $primaryKey = 'id_rapor';
    protected $guarded = ['id_rapor'];
    public $timestamps = false;
}
