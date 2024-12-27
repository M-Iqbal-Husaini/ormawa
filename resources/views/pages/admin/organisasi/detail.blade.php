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

        <a href="{{ route('admin.organisasi') }}" class="btn btn-icon icon-left btn-warning"><i class="fas fa-arrow-left"></i> Kembali</a>

        <div class="row mt-4">
            <div class="col-12 col-md-4 col-lg-12 m-auto">
                <article class="article article-style-c">
                    <div class="article-header">
                        <div class="article-image" data-background="{{asset('images/' . $organiasi->logo) }}"></div>
                    </div>
                <div class="article-details">
                    <div class="article-category"><a href="#">{{ $organiasi->nama }}</a><div class="bullet"></div> <a href="#">{{ $data->category }}</a></div>
                    <p>
                        {{ $organiasi->deskripsi }}
                    </p>
                </div>
                </article>
            </div>
        </div>
    </section>
</div>
@endsection
