<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pegawai extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'ruko_id',
        'nama_pegawai',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function ruko()
    {
        return $this->belongsTo(Ruko::class);
    }
}
