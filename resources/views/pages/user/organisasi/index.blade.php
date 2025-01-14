@extends('layouts.user.main')
@section('content')


<div class="container mx-auto text-center">
    <h1 class="text-3xl font-bold mt-6">DAFTAR <span class="text-orange-500">ORMAWA</span></h1>
    <p class="mt-2 text-gray-600">
        Organisasi kemahasiswaan di tingkat universitas dan fakultas sebagai wadah pengembangan diri, keterlibatan, dan partisipasi mahasiswa.
    </p>

    @foreach ($organisasi->groupBy('kategori') as $kategori => $ormawas)
        <div class="mt-10">
            <h2 class="text-2xl font-semibold text-gray-700">{{ ucfirst($kategori) }}</h2>
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mt-6">
                @foreach ($ormawas as $ormawa)
                <div class="text-center">
                    <!-- Tautan ke Halaman Detail -->
                    <a href="{{ route('organisasi.detail', $ormawa->id) }}">
                        <!-- Logo Organisasi -->
                        <img src="{{ asset('storage/' . $ormawa->logo) }}" alt="{{ $ormawa->nama }}" class="w-24 h-24 mx-auto rounded-full shadow-md hover:shadow-lg transition duration-300">
                        <!-- Nama Organisasi -->
                        <p class="mt-4 font-semibold text-gray-800 hover:text-orange-500 transition duration-300">{{ $ormawa->nama }}</p>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    @endforeach
</div>

@endsection
