@extends('layouts.user.main')
@section('content')

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

@endsection
