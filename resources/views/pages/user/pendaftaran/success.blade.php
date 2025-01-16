@extends('layouts.user.main')

@section('content')
<section class="banner-area" style="background-image: url('{{ asset('assets/templates/logo/logo.jpeg') }}'); background-size: cover; background-position: center; height: 150px;"></section>

<div class="container mt-5">
    <div class="d-flex flex-column align-items-center justify-content-center text-center">
        <!-- Ikon dengan animasi -->
        <div class="p-4">
            <i class="bi bi-check-circle-fill text-success" style="font-size: 5rem; animation: popIn 0.6s ease;"></i>
        </div>

        <!-- Judul dan Pesan -->
        <h1 class="fw-bold text-primary">Pendaftaran Berhasil!</h1>
        <p class="text-secondary mt-3">
            Terima kasih telah mendaftar ke <strong>{{ $organisasi->nama }}</strong>.
        </p>
        <p class="text-secondary">
            Informasi lebih lanjut akan kami kirimkan ke email Anda: <strong>{{ $email }}</strong>.
        </p>

        <!-- Tombol Aksi -->
        <a href="{{ route('organisasi.detail', ['id' => $organisasi->id]) }}" class="btn btn-lg btn-success mt-4 px-5">
            <i class="bi bi-arrow-left-circle me-2"></i>Kembali ke Detail Organisasi
        </a>
    </div>
</div>

<!-- CSS untuk Animasi -->
<style>
    @keyframes popIn {
        0% {
            transform: scale(0.8);
            opacity: 0;
        }
        100% {
            transform: scale(1);
            opacity: 1;
        }
    }
</style>
@endsection
