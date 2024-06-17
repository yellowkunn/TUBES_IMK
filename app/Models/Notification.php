<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'notifications';
    protected $primaryKey = 'id_notification';
    protected $guarded = ['id_notification'];

    public function pengguna()
    {
        return $this->belongsTo(User::class, 'pengguna_id', 'id_pengguna');
    }
}
