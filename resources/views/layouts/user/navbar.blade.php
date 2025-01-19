<header class="header_area sticky-header">
    <div class="main_menu">
        <nav class="navbar navbar-expand-lg navbar-light main_box">
            <div class="container">
                <a class="navbar-brand logo_h d-flex align-items-center" href="{{ route('user.index') }}" style="display: flex; align-items: center;">
                    <img src="{{ asset('assets/templates/logo/LogoOrmawa2.png') }}" alt="" style="height: 55px; margin-right: 8px;">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                    <ul class="nav navbar-nav menu_nav ml-auto">
                        <li class="nav-item {{ request()->routeIs('user.index') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('user.index') }}">Home</a>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav menu_nav ml-5">
                        <li class="nav-item {{ request()->routeIs('user.organisasi') || request()->routeIs('organisasi.detail') || request()->routeIs('pendaftaran.create') || request()->routeIs('organisasi.info') || request()->routeIs('organisasi.success') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('user.organisasi') }}">Ormawa</a>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav menu_nav ml-5">
                        <li class="nav-item {{ request()->routeIs('user.berita') || request()->routeIs('berita.detail') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('user.berita') }}">Berita</a>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav menu_nav ml-5">
                        <li class="nav-item">
                            <a class="nav-link topnav-right" href="{{ route('user.logout') }}">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</header>
<style>
    .navbar-nav {
        display: block !important;
        visibility: visible !important;
        color: black !important;
        }
    .navbar-brand.logo_h {
        display: flex;
        align-items: center;
    }

    .navbar-brand.logo_h img {
        max-height: 40px; /* Pastikan logo tidak terlalu besar */
        margin-right: 8px; /* Tambahkan jarak antara logo dan teks */
    }

    .navbar-brand.logo_h span {
        font-size: 1rem; /* Atur ukuran teks agar seimbang dengan logo */
        color: black; /* Warna teks untuk kecocokan */
    }
</style>


