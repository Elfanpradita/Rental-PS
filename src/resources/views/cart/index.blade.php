@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h3>Keranjang Saya</h3>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($carts->isEmpty())
        <p>Keranjang kosong.</p>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Rental</th>
                    <th>Harga</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($carts as $cart)
                    <tr>
                        <td>{{ $cart->rental->nama_rental }}</td>
                        <td>Rp {{ number_format($cart->rental->harga) }}</td>
                        <td>
                            <form action="{{ route('cart.remove', $cart->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="text-end mt-3">
            <form action="{{ route('checkout') }}" method="POST">
                @csrf
                <button class="btn btn-success">Checkout</button>
            </form>
        </div>
    @endif
</div>
@endsection
