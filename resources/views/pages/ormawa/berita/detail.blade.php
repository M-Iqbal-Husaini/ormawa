@extends('layouts.ormawa.main')

@section('title', 'Detail Berita')

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Detail Berita</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
                <div class="breadcrumb-item active"><a href="{{ route('ormawa.berita') }}">Berita</a></div>
                <div class="breadcrumb-item">Detail Berita</div>
            </div>
        </div>

        <a href="{{ route('ormawa.berita') }}" class="btn btn-icon icon-left btn-warning mb-4">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>

        <div class="row">
            <div class="col-12 col-md-10 col-lg-8 m-auto">
                <div class="card shadow-sm">
                    <div class="card-header">
                        <h4 class="text-center text-primary">{{ $berita->judul }}</h4>
                    </div>
                    <div class="card-body">
                        <div class="text-center">
                            <img src="{{ asset('storage/' . $berita->image) }}"
                                alt="{{ $berita->judul }}"
                                class="img-fluid rounded mb-4"
                                style="max-height: 300px;">
                        </div>
                        <p class="text-muted"><strong>Penulis:</strong> {{ $berita->penulis }}</p>
                        <p class="text-muted"><strong>Organisasi:</strong> {{ $berita->organisasi->nama }}</p>
                        <hr>
                        <div class="article-content">
                            <p>{{ $berita->deskripsi }}</p>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <small class="text-muted">Dipublikasikan pada {{ $berita->created_at->format('d M Y') }}</small>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
