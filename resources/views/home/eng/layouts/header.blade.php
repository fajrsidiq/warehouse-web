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
            <a class="navbar-brand" href="#"><img src="/img/logo.png" style="width: 125px; height: auto;"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
                aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('homepage') ? 'menu-active' : ''}}" aria-current="page" href="/homepage">Home</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('about') ? 'menu-active' : ''}}" href="/aboutus">About</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('coldstorage') ? 'menu-active' : ''}}" href="/services">Coldstorage</a>   
                    </li>                    

                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('ikan') ? 'menu-active' : ''}}" href="/fish">Fishes</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('kirim') ? 'menu-active' : '' }}" href="/delivery">Delivery</a>
                    </li>   

                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('contact') ? 'menu-active' : ''}}" href="/contactus">Contact</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('faq') ? 'menu-active' : ''}}" href="/faqs">FAQ</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Language <i class="fas fa-language"></i>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="/">Bahasa Indonesia</a></li>
                            <li><a class="dropdown-item" href="/homepage">English</a></li>
                        </ul>
                    </li>
                </ul>
                <form class="d-flex">
                    <a href="{{ route('login') }}" class="btn btn-primary"><i class="fas fa-sign-in-alt"></i> Login</a>
            </div>
        </div>
    </nav>
</header>
