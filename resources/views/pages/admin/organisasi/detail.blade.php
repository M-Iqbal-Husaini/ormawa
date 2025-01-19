@extends('layouts.admin.main')

@section('title', 'Admin Detail Organisasi')

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Detail Organisasi</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
                <div class="breadcrumb-item active"><a href="{{ route('admin.organisasi') }}">Organisasi</a></div>
                <div class="breadcrumb-item">Detail Organisasi</div>
            </div>
        </div>

        <a href="{{ route('admin.organisasi') }}" class="btn btn-icon icon-left btn-warning mb-4">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>

        <div class="row">
            <!-- Logo Section -->
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="card">
                    <div class="card-body text-center">
                        <img src="{{ asset('storage/' . $organisasi->logo) }}" alt="Logo {{ $organisasi->nama }}" class="img-fluid rounded" style="max-width: 200px;">
                    </div>
                </div>
            </div>

            <!-- Description Section -->
            <div class="col-lg-8 col-md-6 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <h4>{{ $organisasi->nama }}</h4>
                        <p class="text-muted">{{ $organisasi->kategori }}</p>
                        <p>{{ $organisasi->deskripsi }}</p>
                    </div>
                </div>
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
        </div>
    </section>
</div>
@endsection
