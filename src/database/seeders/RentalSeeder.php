<?php

namespace Database\Seeders;

use App\Models\Rental;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RentalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Rental::create([
            'pegawai_id' => 1,
            'nama_rental' => 'Rental PS Reguler',
            'tipe_rental' => 'PlayStation 4',
            'harga' => 10000,
        ]);
        Rental::create([
            'pegawai_id' => 1,
            'nama_rental' => 'Rental PS VIP',
            'tipe_rental' => 'PlayStation 5',
            'harga' => 20000,
        ]);

        Rental::create([
            'pegawai_id' => 1,
            'nama_rental' => 'Rental PS VVIP',
            'tipe_rental' => 'PlayStation 5 Pro',
            'harga' => 30000,
        ]);
    }
}
