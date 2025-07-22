@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h3>Pembayaran</h3>
    <p>Order ID: {{ $order->midtrans_order_id }}</p>

    <button id="pay-button" class="btn btn-primary">Bayar Sekarang</button>
</div>

<script type="text/javascript"
    src="https://app.sandbox.midtrans.com/snap/snap.js"
    data-client-key="{{ config('midtrans.client_key') }}"></script>

<script>
    var payButton = document.getElementById('pay-button');
    payButton.addEventListener('click', function () {
        snap.pay('{{ $snapToken }}', {
            onSuccess: function(result) {
                alert("Pembayaran sukses!");
                console.log(result);
                // Bisa arahkan ke halaman sukses
                window.location.href = '/';
            },
            onPending: function(result) {
                alert("Menunggu pembayaran...");
                console.log(result);
            },
            onError: function(result) {
                alert("Pembayaran gagal");
                console.log(result);
            }
        });
    });
</script>
@endsection
