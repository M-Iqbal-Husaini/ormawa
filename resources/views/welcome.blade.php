

<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
    <meta name="viewport" content="width-device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="{{ asset('assets/templates/user/img/fav.png') }}">
    @vite(['resources/css/app.css','resources/js/app.js'])
    <meta name="author" content="CodePixar">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta charset="UTF-8">
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

    <title>Merch Store</title>
    <style>
        .navbar-nav {
            display: block !important;
            visibility: visible !important;
            color: black !important;
            }
    </style>
<!-- Start Banner Area -->
</head>
<body>

        <header class="header_area sticky-header">
            <div class="main_menu">

                    <nav class="navbar navbar-expand-lg navbar-light main_box">
                        <div class="container">
                            <a class="navbar-brand logo_h" href="{{ route('welcome') }}"><img src="{{ asset('assets/templates/user/img/logo.png') }}" alt=""></a>
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>

                            <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                                <ul class="nav navbar-nav menu_nav ml-auto">
                                    <li class="nav-item active"><a class="nav-link" href="{{ route('welcome') }}">Home</a></li>
                                </ul>
                                <ul class="nav navbar-nav menu_nav ml-5">
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            ORMAWA
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="{{route('guest.organisasi')}}">Organisasi</a>
                                            {{-- <a class="dropdown-item" href="{{route('guest.pendaftaran')}}">Pendaftaran Ormawa</a> --}}
                                        </div>
                                    </li>
                                </ul>
                                <ul class="nav navbar-nav menu_nav ml-5">
                                    <li class="nav-item "><a class="nav-link" href="{{ route('guest.berita') }}">Berita</a></li>
                                </ul>
                                <ul class="nav navbar-nav menu_nav ml-5">
                                    <li class="nav-item "><a class="nav-link" href="">Kegiatan</a></li>
                                </ul>
                                <ul class="nav navbar-nav menu_nav ml-5">
                                    <li class="nav-item "><a class="nav-link topnav-right" href="{{route('guest.login')}}">LOGIN</a></li>
                                </ul>

                            </div>
                        </div>
                    </nav>

            </div>
        </header>

    <section class="banner-area" style="background-image: url('{{ asset('assets/templates/user/img/banner/banner-ukm.jpg') }}'); background-size: cover; background-position: center;">
        <div class="container">
            <div class="row fullscreen align-items-center justify-content-start">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-5 col-md-6">
                            <div class="banner-content">
                                <h1>ORMAWA <br>Polbeng</h1>
                                <p>ORMAWA (Unit Kegiatan Mahasiswa) Politeknik Negeri Bengkalis adalah wadah kegiatan ekstrakurikuler mahasiswa yang bertujuan untuk mengembangkan minat, bakat, potensi, dan soft skills di luar aktivitas akademik. UKM ini meliputi berbagai bidang seperti seni, olahraga, keagamaan, sosial, teknologi, hingga kewirausahaan.</p>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="banner-img">
                                <img class="img-fluid" src="{{ asset('assets/templates/user/img/Kaisen.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Area -->

    <!-- Start Product Area -->
    <section class="section_gap">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 text-center">
                    <div class="section-title">
                        <h1>UKM Politeknik Negeri Bengkalis</h1>
                        <p>UKM (Unit Kegiatan Mahasiswa) Politeknik Negeri Bengkalis adalah wadah kegiatan ekstrakurikuler mahasiswa yang bertujuan untuk mengembangkan minat, bakat, potensi, dan soft skills di luar aktivitas akademik. UKM ini meliputi berbagai bidang seperti seni, olahraga, keagamaan, sosial, teknologi, hingga kewirausahaan.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="footer-area section_gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <img src="{{asset('assets/templates/user/img/logo.png')}}" alt="">
                    <div class="single-footer-widget">
                        <h6>ORMAWA</h6>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single-footer-widget">
                        <h6>Links</h6>
                        <ul>
                            {{-- <li><a href="{{route('guest.pendaftaran')}}">Pendaftaran</a></li> --}}
                            <li><a href="{{route('guest.berita')}}">Berita</a></li>
                            <li><a href="#">Kegiatan</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single-footer-widget">
                        <h6>Alamat</h6>
                        <p>F552+G9C, Sungai Alam, Kec. Bengkalis, Kabupaten Bengkalis, Riau 28714</p>
                    </div>
                </div>
            </div>
            <div class="footer-bottom d-flex justify-content-center align-items-center flex-wrap">
                <p class="footer-text m-0">&copy; 2024 Copyright by Bebas. All rights reserved</p>
            </div>
        </div>
    </footer>
    <style>
    .footer-area {
        background-color: #f9f9f9;
        padding: 40px 0;
        border-top: 1px solid #ddd;
    }
    .footer-area .single-footer-widget h6 {
        font-size: 16px;
        font-weight: bold;
        margin-bottom: 20px;
    }
    .footer-area .single-footer-widget ul {
        list-style: none;
        padding: 0;
    }
    .footer-area .single-footer-widget ul li {
        margin-bottom: 10px;
    }
    .footer-area .single-footer-widget ul li a {
        color: #555;
        text-decoration: none;
        transition: color 0.3s;
    }
    .footer-area .single-footer-widget ul li a:hover {
        color: #007bff;
    }
    .footer-bottom {
        margin-top: 20px;
    }
    </style>




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

    <!--gmaps Js-->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
    <script src="{{ asset('assets/templates/user/js/gmaps.min.js') }}"></script>
    <script src="{{ asset('assets/templates/user/js/main.js') }}"></script>

</body>
</html>
