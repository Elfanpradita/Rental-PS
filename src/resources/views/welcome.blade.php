<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Rental PS</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        .card-title {
            font-weight: bold;
        }
        .navbar-brand {
            font-weight: bold;
            font-size: 1.3rem;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light px-4">
        <a class="navbar-brand" href="#">🎮 Rental PS</a>
        <div class="ms-auto d-flex align-items-center gap-3">
            @auth
                <a href="{{ route('cart.index') }}" class="btn btn-outline-secondary btn-sm">
                    🛒 Keranjang
                </a>
                <span class="text-muted">Halo, {{ Auth::user()->name }}</span>
                <form action="{{ route('logout') }}" method="POST" class="d-inline">
                    @csrf
                    <button class="btn btn-outline-danger btn-sm">Logout</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="btn btn-outline-primary btn-sm">Login</a>
                <a href="{{ route('register') }}" class="btn btn-primary btn-sm">Daftar</a>
            @endauth
        </div>
    </nav>

    <div class="container mt-5">
        <h2 class="mb-4 text-center">📋 Daftar Rental PS</h2>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="row">
            @forelse($rentals as $rental)
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body d-flex flex-column justify-content-between">
                            <div>
                                <h5 class="card-title">{{ $rental->nama_rental }}</h5>
                                <p class="card-text">💰 Rp {{ number_format($rental->harga) }}</p>
                                <p class="card-text"><small class="text-muted">Pegawai: {{ $rental->pegawai->nama_pegawai ?? '-' }}</small></p>
                            </div>
                        </div>
                        <div class="card-footer bg-white border-top-0 d-flex justify-content-center">
                            @auth
                                <form action="{{ route('keranjang.add', $rental->id) }}" method="POST">
                                    @csrf
                                    <button class="btn btn-sm btn-outline-secondary w-100">+ Tambah ke Keranjang</button>
                                </form>
                            @else
                                <a href="{{ route('login') }}" class="btn btn-sm btn-outline-secondary w-100">+ Tambah ke Keranjang</a>
                            @endauth
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="alert alert-info text-center">Belum ada data rental tersedia.</div>
                </div>
            @endforelse
        </div>
    </div>
</body>
</html>
