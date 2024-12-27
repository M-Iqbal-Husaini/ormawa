@extends('layouts.ormawa.main')
@section('title', 'Detail Berita')
@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Detail Berita</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('ormawa.dashboard') }}">Dashboard</a></div>
                <div class="breadcrumb-item active"><a href="{{ route('ormawa.berita') }}">Detail Berita</a></div>
                <div class="breadcrumb-item">Detail Berita</div>
            </div>
        </div>

        <a href="{{ route('ormawa.berita') }}" class="btn btn-icon icon-left btn-warning"><i class="fas fa-arrow-left"></i> Kembali</a>

        <div class="row mt-4">
            <div class="col-12 col-md-4 col-lg-12 m-auto">
                <article class="article article-style-c">
                    <div class="article-header">
                        <div class="article-details">
                            <div class="article-category"><a href="#">{{ $berita->created_at->format('d-m-Y') }}</a><div class="bullet"></div>
                                <a href="#">{{ $berita->judul_berita }}</a>
                            </div>
                            <p>{{ $berita->konten }}</p>
                        </div>
                    </div>
                </article>
            </div>
        </div>
    </section>
</div>
@endsection
