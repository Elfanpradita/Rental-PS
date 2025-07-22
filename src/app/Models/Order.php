<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'rental_id',
        'pegawai_id',
        'status_order',
        'payment_status',
    ];

    public function rental()
    {
        return $this->belongsTo(Rental::class);
    }

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class);
    }
}
