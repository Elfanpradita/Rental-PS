<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ruko extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_ruko',
    ];

    /**
     * Get the pegawais associated with the ruko.
     */
    public function pegawais()
    {
        return $this->hasMany(Pegawai::class);
    }

    /**
     * Get the rentals associated with the ruko.
     */
    public function rentals()
    {
        return $this->hasMany(Rental::class);
    }
}
