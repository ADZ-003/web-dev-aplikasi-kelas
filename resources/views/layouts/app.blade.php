<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KasMatic</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">KasMatic</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="{{ route('majors.index') }}">Jurusan</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('classes.index') }}">Kelas</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('students.index') }}">Pelajar</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('transactions.index') }}">Transaksi Kas</a></li>
                </ul>
                <ul class="navbar-nav ms-auto">
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">Register</a>
                        </li>
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#"
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if(request()->is('/'))
            <!-- Rich Landing Page Content -->
            <div class="p-5 mb-4 bg-light rounded-3">
                <div class="container-fluid py-5 text-center">
                    <h1 class="display-4 fw-bold">Welcome to KasMatic</h1>
                    <p class="col-md-8 fs-4 mx-auto">Kelola dana kelas Anda dengan mudah dan transparan dengan aplikasi kami yang sederhana dan efektif.</p>
                    <a href="{{ route('register') }}" class="btn btn-primary btn-lg">GasKeun!</a>
                </div>
            </div>

            <div class="row text-center">
                <div class="col-md-4">
                    <div class="card mb-4 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">Manage Majors</h5>
                            <p class="card-text">Atur dan pantau berbagai jurusan di sekolah Anda.</p>
                            <a href="{{ route('majors.index') }}" class="btn btn-outline-primary">View Majors</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-4 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">Manage Classes</h5>
                            <p class="card-text">Kelola informasi kelas dan tugas siswa dengan mudah.</p>
                            <a href="{{ route('classes.index') }}" class="btn btn-outline-primary">View Classes</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-4 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">Track Transactions</h5>
                            <p class="card-text">Menyimpan catatan transparan dari semua transaksi dana kelas.</p>
                            <a href="{{ route('transactions.index') }}" class="btn btn-outline-primary">View Transactions</a>
                        </div>
                    </div>
                </div>
            </div>

            <footer class="pt-4 my-md-5 pt-md-5 border-top text-center">
                <p class="text-muted">© 2024 KasMatic. All rights reserved.</p>
            </footer>
        @else
            @yield('content')
        @endif
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
