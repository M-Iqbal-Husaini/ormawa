@extends('layouts.user.main')

@section('content')
<section class="banner-area"
    style="background-image: url('{{ asset('assets/templates/logo/logo.jpeg') }}');
           background-size: cover;
           background-position: center;
           height: 300px;">
</section>

<div class="container mx-auto mt-10">
    <!-- Header Organisasi -->
    <div class="text-center">
        <img src="{{ asset('storage/' . $organisasi->logo) }}"
             alt="{{ $organisasi->nama }}"
             class="w-40 h-40 mx-auto rounded-full shadow-md">
        <h1 class="text-4xl font-extrabold mt-6 text-blue-600">{{ $organisasi->nama }}</h1>
        <p class="text-gray-600 mt-4 text-lg">{{ $organisasi->deskripsi }}</p>
    </div>

    <!-- Visi dan Misi -->
    <div class="grid md:grid-cols-2 gap-8 mt-10">
        <div class="bg-white shadow-md p-6 rounded-lg">
            <h2 class="text-2xl font-bold text-blue-500"><i class="fas fa-eye"></i> Visi</h2>
            <p class="text-gray-700 mt-3">{{ $organisasi->visi }}</p>
        </div>
        <div class="bg-white shadow-md p-6 rounded-lg">
            <h2 class="text-2xl font-bold text-blue-500"><i class="fas fa-tasks"></i> Misi</h2>
            <ul class="list-disc pl-6 mt-3">
                @foreach ($organisasi->misi as $misi)
                    <li class="text-gray-700">{{ $misi }}</li>
                @endforeach
            </ul>
        </div>
    </div>

    <!-- Syarat dan Panduan Pendaftaran -->
    <div class="grid md:grid-cols-2 gap-8 mt-10">
        <div class="bg-blue-100 shadow-md p-6 rounded-lg">
            <h2 class="text-2xl font-bold text-blue-700"><i class="fas fa-check-circle"></i> Syarat Pendaftaran</h2>
            <ul class="list-disc pl-6 mt-3 text-gray-800">
                <li>Mahasiswa aktif dengan minimal semester 2.</li>
                <li>Memiliki komitmen untuk mengikuti kegiatan organisasi.</li>
                <li>Mengisi formulir pendaftaran dengan benar.</li>
                <li>Melampirkan CV (Curriculum Vitae).</li>
            </ul>
        </div>
        <div class="bg-blue-100 shadow-md p-6 rounded-lg">
            <h2 class="text-2xl font-bold text-blue-700"><i class="fas fa-info-circle"></i> Panduan Pendaftaran</h2>
            <ol class="list-decimal pl-6 mt-3 text-gray-800">
                <li>Klik tombol "Daftar Sekarang" di bawah.</li>
                <li>Isi formulir pendaftaran sesuai dengan data diri Anda.</li>
                <li>Unggah CV (Curriculum Vitae) Anda dalam format PDF.</li>
                <li>Kirim formulir, lalu masuk ke grup wa untuk informasi selanjutnya.</li>
            </ol>
        </div>
    </div>

    <!-- Tombol Pendaftaran -->
    <div class="flex flex-col md:flex-row gap-4 justify-center mt-10">
        <a href="{{ route('pendaftaran.create', ['id_organisasi' => $organisasi->id]) }}"
           class="inline-block bg-blue-600 text-white px-8 py-3 rounded-lg shadow-lg hover:bg-blue-700 transition duration-200">
            <i class="fas fa-edit"></i> Daftar Sekarang
        </a>

        @if ($organisasi->info_button)
        <a href="{{ route('organisasi.info', ['id_organisasi' => $organisasi->id]) }}"
           class="inline-block bg-green-600 text-white px-8 py-3 rounded-lg shadow-lg hover:bg-green-700 transition duration-200">
            <i class="fas fa-bullhorn"></i> Lihat Pengumuman
        </a>
        @endif
    </div>
</div><br>
@endsection
