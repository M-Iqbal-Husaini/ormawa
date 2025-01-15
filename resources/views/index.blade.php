<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="{{ asset('assets/templates/user/img/fav.png') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
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
        /* CSS Umum */
        .navbar-nav { display: block !important; visibility: visible !important; color: black !important; }
        .animated-text { display: inline-block; font-weight: bold; font-size: 5rem; color: white; animation: text-slide 2s ease-in-out infinite; }
        .responsive-description { font-size: 16px; line-height: 1.8; text-align: center; margin: 0 auto; width: 90%; max-width: 960px; }
        @media (max-width: 768px) { .responsive-description { font-size: 14px; text-align: left; } }
        @keyframes text-slide { 0% { opacity: 0; transform: translateY(20px); } 25%, 75% { opacity: 1; transform: translateY(0); } 100% { opacity: 0; transform: translateY(-20px); } }

        /* CSS Banner */
        .banner-area {
            background-image: url('{{ asset('assets/templates/user/img/polbeng1.jpeg') }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat; /* Mencegah pengulangan gambar */
            height: 750px; /* Tinggi default banner */
        }
        @media (max-width: 768px) {
            .banner-area {
                height: 400px; /* Tinggi banner untuk tampilan mobile */
            }
        }

        /* CSS Footer */
        .footer-area { background-color: #34495e; padding: 50px 0; border-top: 5px solid #2c3e50; color: #ecf0f1; }
        .footer-area h6 { font-size: 18px; font-weight: bold; margin-bottom: 15px; text-transform: uppercase; color: #f1c40f; }
        .footer-area ul { list-style: none; padding: 0; }
        .footer-area li { margin-bottom: 10px; }
        .footer-area a { color: #ecf0f1; text-decoration: none; font-size: 14px; transition: color 0.3s; }
        .footer-area a:hover { color: #f1c40f; }
        .footer-area i { margin-right: 8px; color: #f1c40f; }
        .footer-bottom { margin-top: 30px; border-top: 1px solid #7f8c8d; padding-top: 15px; text-align: center; }
        .footer-bottom .footer-text { font-size: 14px; color: #bdc3c7; }
        .footer-area img { border-radius: 10px; max-width: 150px; margin-bottom: 20px; }
        @media (max-width: 768px) {
            .footer-area .row { flex-direction: column; text-align: center; }
            .footer-area .col-lg-4 { width: 100%; margin-bottom: 20px; }
            .footer-area img { margin: 0 auto 20px; }
        }
    </style>
</head>

<body>
    <header class="header_area sticky-header">
        <div class="main_menu">
            <nav class="navbar navbar-expand-lg navbar-light main_box">
                <div class="container">
                    <a class="navbar-brand logo_h" href="{{ route('user.index') }}"><img src="{{ asset('assets/templates/user/img/logo.png') }}" alt=""></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                        <ul class="nav navbar-nav menu_nav ml-auto">
                            <li class="nav-item active"><a class="nav-link" href="{{ route('guest.index') }}">Home</a></li>
                        </ul>
                        <ul class="nav navbar-nav menu_nav ml-5">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    ORMAWA
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('user.organisasi') }}">Organisasi</a>
                                    <a class="dropdown-item" href="{{ route('user.pendaftaran') }}">Pendaftaran Ormawa</a>
                                </div>
                            </li>
                        </ul>
                        <ul class="nav navbar-nav menu_nav ml-5">
                            <li class="nav-item"><a class="nav-link" href="{{ route('user.berita') }}">Berita</a></li>
                        </ul>
                        <ul class="nav navbar-nav menu_nav ml-5">
                            <li class="nav-item"><a class="nav-link topnav-right" href="{{ route('guest.login') }}">LOGIN</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </header>

    <section class="banner-area" >
        <div class="container">
            <div class="row fullscreen align-items-center justify-content-start">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-5 col-md-6">
                            <div class="banner-content" style="color: #BFECFF; margin-top: 100px;">
                                <h1 style="color: #FF5733; font-size: 4rem;">Ormawa <br><span class="animated-text">Polbeng</span></h1>
                            </div>
                        </div>
                        <div class="col-lg-7 d-none d-lg-block"> <div class="banner-img" style="height: 100%;">
                            <img class="img-fluid" src="{{ asset('assets/templates/user/img/') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section_gap">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10 text-center">
                <div class="section-title">
                    <h1>Website ORMAWA Polbeng</h1>
                    <p class="responsive-description">
                        Website ORMAWA Politeknik Negeri Bengkalis adalah platform digital yang menyediakan informasi tentang kegiatan dan organisasi Unit Kegiatan Mahasiswa (UKM) di kampus. Dengan fitur berita terbaru, pendaftaran anggota, dan kegiatan mendatang, website ini menjadi sumber informasi utama bagi mahasiswa dan masyarakat. Tampilannya yang user-friendly mendukung mahasiswa untuk mengembangkan minat, bakat, dan potensi, sekaligus mempermudah akses ke berbagai kegiatan di Politeknik Negeri Bengkalis.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="container mx-auto px-4 py-8 max-w-7xl">
    <h2 class="text-3xl font-bold text-center text-gray-800 mb-6">Berita Terbaru</h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 justify-items-stretch">
        @foreach ($news as $berita)
        <div class="berita-item bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition transform hover:scale-105 p-6" data-category="{{ $berita->kategori }}">
            <img src="{{ asset('storage/' . $berita->image) }}" alt="Gambar Berita {{ $berita->judul }}" class="w-full h-40 object-cover">
            <div class="p-4">
                <div class="text-gray-500 text-xs mb-2">
                    <i class="far fa-calendar-alt"></i>
                    {{ $berita->created_at->format('d M Y') }}
                    <i class="fas fa-user ml-2"></i>
                    {{ $berita->penulis }}
                </div>
                <h3 class="text-sm md:text-base font-semibold mb-2 mt-0">
                    <a href="{{ route('berita.detail', $berita->id) }}" class="text-gray-800 hover:text-blue-500 transition">
                        {{ $berita->judul }}
                    </a>
                </h3>
                <p class="text-gray-600 text-xs md:text-sm leading-relaxed mb-3">
                    {{ Str::limit($berita->deskripsi, 100) }}
                </p>
                <a class="text-blue-500 hover:text-blue-600 transition text-xs font-medium" href="{{ route('berita.detail', $berita->id) }}">
                    READ MORE
                    <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </div>
        @endforeach

        @if ($news->isEmpty())
        <div class="text-center text-gray-500 font-semibold col-span-full">
            Tidak ada berita terbaru.
        </div>
        @endif
    </div>
</section>

<footer class="footer-area section_gap">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <img src="{{asset('assets/templates/user/img/logo.png')}}" alt="">
                <div class="single-footer-widget">
                    <h6>ORMAWA</h6>
                    <p>
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. It has been the industry's standard dummy text ever since the 1500s.
                    </p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="single-footer-widget">
                    <h6>Links</h6>
                    <ul>
                        <li><a href="{{route('user.pendaftaran')}}"><i class="fas fa-chevron-right"></i> Pendaftaran</a></li>
                        <li><a href="#"><i class="fas fa-chevron-right"></i> Berita</a></li>
                        <li><a href="{{route('user.kegiatan')}}"><i class="fas fa-chevron-right"></i> Kegiatan</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="single-footer-widget">
                    <h6>Alamat</h6>
                    <p>
                        F552+G9C, Sungai Alam, Kec. Bengkalis, Kabupaten Bengkalis, Riau 28714
                    </p>
                </div>
            </div>
        </div>
        <div class="footer-bottom d-flex justify-content-center align-items-center flex-wrap">
            <p class="footer-text m-0">&copy; 2024 Copyright by Bebas. All rights reserved</p>
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
