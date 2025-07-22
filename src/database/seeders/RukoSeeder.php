<?php

namespace Database\Seeders;

use App\Models\Ruko;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RukoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Ruko::create([
            'nama_ruko' => 'Ruko Jeremy',
        ]);
    }
}
