@extends('layouts.guest.main')

@section('content')

<!-- Banner Section -->
<section class="banner-area" style="background-image: url('{{ asset('storage/' . $news->image) }}'); background-size: cover; background-position: center; height: 300px;">
    <div class="container mx-auto h-full flex items-center justify-center">
    </div>
</section>

<!-- Content Section -->
<section class="py-12 mt-6"> <!-- Added mt-6 to move content upwards -->
    <div class="container mx-auto px-4 md:px-8 lg:px-16">
        <div class="bg-gray-800 rounded-lg shadow-md p-6">
            <div class="mb-6">
                <!-- Update image size here -->
                <img src="{{ asset('storage/' . $news->image) }}"  class="w-4/5 md:w-3/4 lg:w-2/3 mx-auto rounded-lg object-cover">
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
                    Kembali
                </a>
            </div>
        </div>
    </div>
</section>

@endsection
