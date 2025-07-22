<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Midtrans\Snap;
use Midtrans\Config;

class CheckoutController extends Controller
{
    public function checkout()
    {
        $user = Auth::user();
        $carts = Cart::with('rental')->where('user_id', $user->id)->get();
        if ($carts->isEmpty()) {
            return back()->with('error', 'Keranjang kosong.');
        }

        $rental = $carts->first()->rental;

        // Buat entry order pertama
        $order = Order::create([
            'rental_id' => $rental->id,
            'pegawai_id' => $rental->pegawai_id,
            'status_order' => 'pending',
            'payment_status' => 'pending',
        ]);

        // Konfigurasi Midtrans
        Config::$serverKey = config('midtrans.server_key');
        Config::$isProduction = config('midtrans.is_production');
        Config::$isSanitized = config('midtrans.is_sanitized');
        Config::$is3ds = config('midtrans.is_3ds');

        $params = [
            'transaction_details' => [
                'order_id' => 'ORDER-' . $order->id . '-' . Str::random(6),
                'gross_amount' => (int) $rental->harga,
            ],
            'customer_details' => [
                'first_name' => $user->name,
                'email' => $user->email,
            ],
        ];

        $snapToken = Snap::getSnapToken($params);

        // Hapus semua keranjang setelah create order
        Cart::where('user_id', $user->id)->delete();

        return view('checkout.show', compact('snapToken', 'order'));
    }
}
