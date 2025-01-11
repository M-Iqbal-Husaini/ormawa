@extends('layouts.user.main')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Berita</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<section class="banner-area" style="background-image: url('{{ asset('assets/templates/user/img/banner/banner-ukm.jpg') }}'); background-size: cover; background-position: center; margin-top: 50px;">
    <div class="container">
        <div class="row fullscreen align-items-center justify-content-start">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-5 col-md-6">
                        <div class="banner-content">
                            <!-- Tambahkan margin-top untuk menurunkan tulisan -->
                            <h1 class="mt-1">ORMAWA <br>Polbeng</h1>
                            <p class="mt-4">ORMAWA (Unit Kegiatan Mahasiswa) Politeknik Negeri Bengkalis adalah wadah kegiatan ekstrakurikuler mahasiswa yang bertujuan untuk mengembangkan minat, bakat, potensi, dan soft skills di luar aktivitas akademik. UKM ini meliputi berbagai bidang seperti seni, olahraga, keagamaan, sosial, teknologi, hingga kewirausahaan.</p>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="banner-img">
                            <!-- Tambahkan kelas Tailwind untuk memperkecil ukuran gambar -->
                            <img class="img-fluid w-1/4 mx-auto" src="{{ asset('assets/templates/user/img/Kaisen.png') }}" alt="">
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

<section class="section_gap">
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-6">Berita Terbaru</h1>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach ($beritas as $berita)
                <div class="bg-gray-800 rounded-lg shadow-md overflow-hidden">
                    <img src="{{ asset('storage/' . $berita->image) }}" alt="Gambar" class="w-full h-48 object-cover">
                    <div class="p-4">
                        <span class="text-sm font-semibold text-purple-400">{{ $berita->organisasi->nama }}</span>
                        <h2 class="text-xl font-bold mt-2">{{ $berita->judul }}</h2>
                        <p class="text-gray-400 text-sm mt-2">
                            {{ Str::limit($berita->deskripsi, 100) }}
                        </p>
                        <div class="flex items-center mt-4">
                            <img src="https://via.placeholder.com/40" alt="Avatar" class="w-10 h-10 rounded-full">
                            <div class="ml-3">
                                <p class="font-semibold">{{ $berita->penulis }}</p>
                                <p class="text-gray-400 text-sm">15 Aug 2021 · 16 min read</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<body class="bg-gray-900 text-white">

</body>
</html>

@endsection
