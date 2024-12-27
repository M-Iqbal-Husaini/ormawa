<header class="header_area sticky-header">
    <div class="main_menu">
        <nav class="navbar navbar-expand-lg navbar-light main_box">
            <div class="container">
                <a class="navbar-brand logo_h" href="{{ route('user.dashboard') }}">
                    <img src="{{ asset('assets/templates/user/img/logo.png') }}" alt="Logo">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="nav navbar-nav menu_nav ml-auto">
                        <li class="nav-item active"><a href="{{ route('user.dashboard') }}" class="nav-link">Home</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">Ormawa</a>
                            <div class="dropdown-menu">
                                <a href="#" class="dropdown-item">UKM</a>
                                <a href="#" class="dropdown-item">HMJ</a>
                            </div>
                        </li>
                        <li class="nav-item"><a href="#" class="nav-link">Berita</a></li>
                        <li class="nav-item"><a href="{{ route('user.login') }}" class="nav-link">Login</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</header>
