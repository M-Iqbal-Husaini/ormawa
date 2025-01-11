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
<body class="bg-gray-900 text-white">

<!-- Banner Section -->
<section class="banner-area" style="background-image: url('{{ asset('assets/templates/user/img/banner/banner-ukm.jpg') }}'); background-size: cover; background-position: center;">
    <div class="container">
        <div class="row fullscreen align-items-center justify-content-start">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-5 col-md-6">
                        <div class="banner-content">
                            <h1 class="mt-6">ORMAWA <br>Polbeng</h1>
                            <p class="mt-4">ORMAWA (Unit Kegiatan Mahasiswa) Politeknik Negeri Bengkalis adalah wadah kegiatan ekstrakurikuler mahasiswa yang bertujuan untuk mengembangkan minat, bakat, potensi, dan soft skills di luar aktivitas akademik. UKM ini meliputi berbagai bidang seperti seni, olahraga, keagamaan, sosial, teknologi, hingga kewirausahaan.</p>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="banner-img">
                            <img class="img-fluid w-3/4 mx-auto" src="{{ asset('assets/templates/user/img/Kaisen.png') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Berita Terbaru Section -->
<section class="banner-area" style="background-image: url('{{ asset('assets/templates/user/img/banner/banner-ukm.jpg') }}'); background-size: cover; background-position: center;">
    <div class="container mx-auto px-4 py-8">
        <div class="bg-gray-900 bg-opacity-80 rounded-lg p-6">
            <h1 class="text-3xl font-bold text-center mb-8 text-white">Berita Terbaru</h1>
            <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach ($berita)
                    <div class="bg-white rounded-lg shadow-md overflow-hidden transform transition duration-300 hover:scale-105">
                        <img src="{{ asset('storage/' . $berita->image) }}" alt="Gambar" class="w-full h-40 object-cover">
                        <div class="p-4">
                            <!-- Nama Organisasi dengan Link -->
                            <a href="{{ route('organisasi.detail', $berita->organisasi->id) }}" class="text-sm font-semibold text-purple-600 hover:underline">
                                {{ $berita->organisasi->nama }}
                            </a>
                            <!-- Detail Berita dengan Link -->
                            <h2 class="text-xl font-bold mt-2">
                                <a href="{{ route('berita.detail', $berita->id) }}" class="text-white hover:text-purple-400 hover:underline">
                                    {{ $berita->judul }}
                                </a>
                            </h2>
                            <!-- Judul Berita -->
                            <h2 class="text-lg font-bold mt-2 text-gray-900">{{ $berita->judul }}</h2>
                            <!-- Deskripsi -->
                            <p class="text-gray-600 text-sm mt-2">
                                {{ Str::limit($berita->deskripsi, 100) }}
                            </p>
                        </div>
                        <!-- Penulis dan Tanggal -->
                        <div class="flex items-center justify-between px-4 py-2 bg-gray-100 text-gray-700">
                            <div class="flex items-center">
                                <p class="ml-2 text-sm font-medium">{{ $berita->penulis }}</p>
                            </div>
                            <p class="text-sm text-gray-500">
                                {{ $berita->created_at->format('d M Y') }}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

</body>
</html>

@endsection
