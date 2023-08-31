<style>
    .menu-active{
        color: black !important;
        font-weight: bold;
    }
</style>

<header>
    <!-- Fixed navbar -->
    <nav class="navbar navbar-expand-md navbar-light bg-light shadow">
        <div class="container">
            <a class="navbar-brand" href="#">Laut Biru Perkasa</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
                aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('/') ? 'menu-active' : ''}}" aria-current="page" href="/">Home</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('about') ? 'menu-active' : ''}}" href="/about">About</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('coldstorage') ? 'menu-active' : ''}}" href="coldstorage">Coldstorage</a>   
                    </li>                    

                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('ikan') ? 'menu-active' : ''}}" href="/ikan">Jenis Ikan</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('kirim') ? 'menu-active' : '' }}" href="/kirim">Pengiriman</a>
                    </li>   

                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('contact') ? 'menu-active' : ''}}" href="/contact">Contact</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('faq') ? 'menu-active' : ''}}" href="/faq">FAQ</a>
                    </li>
                </ul>
                <form class="d-flex">
                    <a href="{{ route('login') }}" class="btn btn-primary"><i class="fas fa-sign-in-alt"></i> Login</a>
            </div>
        </div>
    </nav>
</header>
