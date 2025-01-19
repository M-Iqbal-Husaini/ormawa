<header class="header_area sticky-header">
    <div class="main_menu">
        <nav class="navbar navbar-expand-lg navbar-light main_box">
            <div class="container">
                <a class="navbar-brand logo_h d-flex align-items-center" href="{{ route('guest.index') }}" style="display: flex; align-items: center;">
                    <img src="{{ asset('assets/templates/logo/LogoOrmawa2.png') }}" alt="" style="height: 55px; margin-right: 8px;">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                    <ul class="nav navbar-nav menu_nav ml-auto">
                        <li class="nav-item {{ request()->routeIs('guest.index') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('guest.index') }}">Home</a>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav menu_nav ml-5">
                        <li class="nav-item {{ request()->routeIs('guest.organisasi') || request()->routeIs('guest.organisasi.detail') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('guest.organisasi') }}">Ormawa</a>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav menu_nav ml-5">
                        <li class="nav-item {{ request()->routeIs('guest.berita') || request()->routeIs('guest.berita.detail') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('guest.berita') }}">Berita</a>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav menu_nav ml-5">
                        <li class="nav-item">
                            <a class="nav-link topnav-right" href="{{ route('guest.login') }}">Login</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</header>
