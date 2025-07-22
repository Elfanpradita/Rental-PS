<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Order::create([
            'rental_id' => 1,
            'pegawai_id' => 1,
            'status_order' => 'pending',
            'payment_status' => 'unpaid',
        ]);
    }
}
