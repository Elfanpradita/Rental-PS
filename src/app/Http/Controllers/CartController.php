<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Rental;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $carts = Cart::with('rental')->where('user_id', Auth::id())->get();
        return view('cart.index', compact('carts'));
    }

    public function add($rentalId)
    {
        Cart::create([
            'user_id' => Auth::id(),
            'rental_id' => $rentalId,
        ]);

        return back()->with('success', 'Rental berhasil ditambahkan ke keranjang.');
    }

    public function remove($id)
    {
        $cart = Cart::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        $cart->delete();

        return back()->with('success', 'Rental dihapus dari keranjang.');
    }
}
