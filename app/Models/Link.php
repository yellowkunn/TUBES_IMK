<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'links';
    protected $primaryKey = 'id_link';
    protected $guarded = ['id_link'];
}
