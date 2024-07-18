<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laut Biru Perkasa') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

    <style>
        .navbar {
            background-color: #00BFFF !important;
            border-bottom-left-radius: 20px;
            border-bottom-right-radius: 20px;
        }

        .nav-link {
            font-size: 20px;
        }

        .table {
            font-size: 20px;
        }

        /* Ensure the card and table are responsive */
        .card {
            margin-bottom: 20px;
            /* Add some space below the card */
        }

        .table-responsive {
            overflow-x: auto;
            /* Allow horizontal scroll */
            -webkit-overflow-scrolling: touch;
            /* Smooth scrolling on touch devices */
        }

        .table th {
            word-wrap: break-word;
            /* Allow long words to break */
            white-space: nowrap;
            /* Prevent text from wrapping to the next line */
            max-width: 200px;
            /* Set a max-width to table cells */
            background-color: #00BFFF;
            color: black;
        }

        .table td {
            word-wrap: break-word;
            /* Allow long words to break */
            white-space: nowrap;
            /* Prevent text from wrapping to the next line */
            max-width: 200px;
            /* Set a max-width to table cells */
        }

        @media (max-width: 768px) {
            .card-header h2 {
                font-size: 1.5rem;
                /* Adjust header size for smaller screens */
            }

            .table {
                font-size: 0.875rem;
                /* Make table text smaller on mobile */
            }

            .table th,
            .table td {
                white-space: normal;
                /* Allow text to wrap on smaller screens */
            }

        }
    </style>
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="/img/logo.png" style="width: 125px; height: auto;">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        @if (Auth::check())
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('stock.current') }}">{{ __('Dashboard') }}</a>
                            </li>
                            @if (Auth::user()->role === 'admin')
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink"
                                        role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Input Data 1 <i class="fas fa-language"></i>
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                        <li><a class="dropdown-item" href="{{ route('newitem.create') }}">Input Jenis
                                                Baru</a></li>
                                        <li><a class="dropdown-item" href="{{ route('stock.in') }}">Input Data Masuk</a>
                                        </li>
                                        <li><a class="dropdown-item" href="{{ route('stock.out') }}">Input Data
                                                Keluar</a></li>
                                    </ul>
                                </li>
                            @endif
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink"
                                    role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Data Stok <i class="fas fa-language"></i>
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <li><a class="dropdown-item" href="{{ route('logs.incoming') }}">Tabel Data
                                            Masuk</a></li>
                                    <li><a class="dropdown-item" href="{{ route('logs.outgoing') }}">Tabel Data
                                            Keluar</a></li>
                                    <li><a class="dropdown-item" href="{{ route('delete_history.index') }}">Riwayat
                                            Penghapusan</a></li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link"
                                    href="{{ route('stock.valuation') }}">{{ __('Valuasi Nilai') }}</a>
                            </li>
                        @endif
                    </ul>




                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
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

        <main class="py-4" style="overflow-x: auto;">
            @yield('content')
        </main>
    </div>
</body>

</html>
