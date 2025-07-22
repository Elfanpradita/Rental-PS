<?php

namespace App\Http\Controllers;

use App\Models\Rental;

class RentalController extends Controller
{
    public function index()
    {
        // Ambil semua data rental beserta pegawai yang bertanggung jawab
        $rentals = Rental::with('pegawai')->get();

        // Kirim ke view 'welcome'
        return view('welcome', compact('rentals'));
    }
}
