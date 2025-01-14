@extends('layouts.user.main')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $news->judul }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-white">

<!-- Banner Section -->
<section class="banner-area" style="background-image: url('{{ asset('storage/' . $news->image) }}'); background-size: cover; background-position: center; height: 300px;">
    <div class="container mx-auto h-full flex items-center justify-center">
        <div class="text-center bg-black bg-opacity-50 p-6 rounded-lg">
            <h1 class="text-4xl font-bold text-white">{{ $news->judul }}</h1>
            <p class="mt-2 text-sm text-gray-300">
                {{ $news->created_at->format('d M Y') }} |
                <a href="{{ route('organisasi.detail', $news->organisasi->id) }}" class="text-purple-400 hover:underline">
                    {{ $news->organisasi->nama }}
                </a>
            </p>
        </div>
    </div>
</section>

<!-- Content Section -->
<section class="py-12">
    <div class="container mx-auto px-4 md:px-8 lg:px-16">
        <div class="bg-gray-800 rounded-lg shadow-md p-6">
            <div class="mb-6">
                <img src="{{ asset('storage/' . $news->image) }}" alt="{{ $news->judul }}" class="w-full rounded-lg object-cover">
            </div>
            <div class="text-center">
                <h2 class="text-3xl font-bold text-white">{{ $news->judul }}</h2>
                <p class="text-gray-400 text-sm mt-2">
                    Ditulis oleh <span class="text-purple-400">{{ $news->penulis }}</span> pada {{ $news->created_at->format('d M Y') }}
                </p>
            </div>
            <div class="mt-6 text-gray-200 leading-relaxed">
                <p>{{ $news->deskripsi }}</p>
            </div>
            <div class="mt-8 text-center">
                <a href="{{ route('user.berita') }}" class="px-6 py-2 bg-purple-600 text-white rounded-lg hover:bg-purple-700 transition">
                    Kembali ke Berita Terbaru
                </a>
            </div>
        </div>
    </div>
</section>



</body>
</html>
@endsection
