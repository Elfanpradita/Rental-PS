<!DOCTYPE html>
<html>
<head>
    <title>Pembayaran</title>
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="YOUR-CLIENT-KEY"></script>
</head>
<body>
    <h3>Memproses Pembayaran...</h3>
    <script>
        window.snap.pay('{{ $snapToken }}', {
            onSuccess: function(result) {
                alert("Pembayaran berhasil!");
                window.location.href = "/";
            },
            onPending: function(result) {
                alert("Menunggu pembayaran.");
            },
            onError: function(result) {
                alert("Pembayaran gagal.");
            }
        });
    </script>
</body>
</html>
