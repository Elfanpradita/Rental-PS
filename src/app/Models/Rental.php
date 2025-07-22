<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Rental extends Model
{
    use HasFactory;

    protected $fillable = [
        'pegawai_id',
        'nama_rental',
        'tipe_rental', // Optional field for rental type
        'harga',
    ];

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
