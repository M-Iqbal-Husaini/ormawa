

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
    /* CSS Umum */
    .navbar-nav { display: block !important; visibility: visible !important; color: black !important; }
    .animated-text { display: inline-block; font-weight: bold; font-size: 5rem; color: white; animation: text-slide 2s ease-in-out infinite; }
    .responsive-description { font-size: 16px; line-height: 1.8; text-align: center; margin: 0 auto; width: 90%; max-width: 960px; }
    @media (max-width: 768px) { .responsive-description { font-size: 14px; text-align: left; } }
    @keyframes text-slide { 0% { opacity: 0; transform: translateY(20px); } 25%, 75% { opacity: 1; transform: translateY(0); } 100% { opacity: 0; transform: translateY(-20px); } }

    /* CSS Banner */
    .banner-area {
        background-image: url('{{ asset('assets/templates/logo/logo.jpeg') }}');
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
