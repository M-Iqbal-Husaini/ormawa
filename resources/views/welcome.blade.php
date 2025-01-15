<!DOCTYPE html>
<html lang="en" class="no-js">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="{{ asset('assets/templates/user/img/logo.png') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <meta name="author" content="CodePixar">
    <meta charset="UTF-8">
    <title>Ormawa Polbeng</title>

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('assets/templates/user/css/linearicons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/templates/user/css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/templates/user/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/templates/user/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/templates/user/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/templates/user/css/nouislider.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/templates/user/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/templates/user/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/templates/user/css/ion.rangeSlider.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/templates/user/css/ion.rangeSlider.skinFlat.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/templates/user/css/magnific-popup.css') }}">

    <style>
        .navbar-nav {
            display: block !important;
            visibility: visible !important;
            color: black !important;
        }

        .banner-area {
            background-image: url('{{ asset('assets/templates/logo/logo.jpeg') }}');
            background-size: cover;
            background-position: center;
            height: 750px;
        }

        @media (max-width: 768px) {
            .banner-area {
                height: 400px;
            }
        }
    </style>
</head>

<body>
    <!-- Header -->
    <header class="header_area sticky-header">
        <div class="main_menu">
            <nav class="navbar navbar-expand-lg navbar-light main_box">
                <div class="container">
                    <a class="navbar-brand logo_h" href="{{ route('user.index') }}">
                        <img src="{{ asset('assets/templates/user/img/logo.png') }}" alt="Logo">
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                        <ul class="nav navbar-nav menu_nav ml-auto">
                            <li class="nav-item active"><a class="nav-link" href="{{ route('guest.index') }}">Home</a></li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">ORMAWA</a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="{{ route('user.organisasi') }}">Organisasi</a>
                                    <a class="dropdown-item" href="{{ route('user.pendaftaran') }}">Pendaftaran Ormawa</a>
                                </div>
                            </li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('user.berita') }}">Berita</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('guest.login') }}">LOGIN</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </header>

    <!-- Banner -->
    <section class="banner-area">
        <div class="container">
            <div class="row fullscreen align-items-center justify-content-start">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-5 col-md-6">
                            <div class="banner-content" style="color: #BFECFF; margin-top: 100px;">
                                <h1 style="color: #FF5733; font-size: 4rem;">Ormawa <br><span>Polbeng</span></h1>
                            </div>
                        </div>
                        <div class="col-lg-7 d-none d-lg-block">
                            <div class="banner-img">
                                <img src="{{ asset('assets/templates/logo/logo.jpeg') }}" alt="Banner Image" class="img-fluid">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer-area section_gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <img src="{{ asset('assets/templates/user/img/logo.png') }}" alt="Logo Footer">
                    <h6>ORMAWA</h6>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                </div>
                <div class="col-lg-4">
                    <h6>Links</h6>
                    <ul>
                        <li><a href="{{ route('user.pendaftaran') }}">Pendaftaran</a></li>
                        <li><a href="#">Berita</a></li>
                        <li><a href="{{ route('user.kegiatan') }}">Kegiatan</a></li>
                    </ul>
                </div>
                <div class="col-lg-4">
                    <h6>Contact</h6>
                    <p>Politeknik Negeri Bengkalis</p>
                </div>
            </div>
        </div>
    </footer>
<script>
    document.addEventListener("DOMContentLoaded", () => {
        const words = ["Polbeng", "Mahasiswa Kreatif", "Tunjukan Potensimu!"];
        const textElement = document.querySelector(".animated-text");
        let index = 0;

        textElement.addEventListener("animationiteration", () => {
            index = (index + 1) % words.length;
            textElement.textContent = words[index];
        });
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{ asset('assets/templates/user/js/vendor/jquery-2.2.4.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="{{ asset('assets/templates/user/js/vendor/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/templates/user/js/jquery.ajaxchimp.min.js') }}"></script>
<script src="{{ asset('assets/templates/user/js/jquery.nice-select.min.js') }}"></script>
<script src="{{ asset('assets/templates/user/js/jquery.sticky.js') }}"></script>
<script src="{{ asset('assets/templates/user/js/nouislider.min.js') }}"></script>
<script src="{{ asset('assets/templates/user/js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('assets/templates/user/js/owl.carousel.min.js') }}"></script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
<script src="{{ asset('assets/templates/user/js/gmaps.min.js') }}"></script>
<script src="{{ asset('assets/templates/user/js/main.js') }}"></script>

</body>

</html>
