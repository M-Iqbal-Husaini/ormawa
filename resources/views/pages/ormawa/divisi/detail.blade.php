@extends('layouts.ormawa.main')
@section('title', 'Detail Divisi')
@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Detail Divisi</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('ormawa.dashboard') }}">Dashboard</a></div>
                <div class="breadcrumb-item active"><a href="{{ route('ormawa.divisi') }}">Detail Divisi</a></div>
                <div class="breadcrumb-item">Detail Divisi</div>
            </div>
        </div>

        <a href="{{ route('ormawa.divisi') }}" class="btn btn-icon icon-left btn-warning"><i class="fas fa-arrow-left"></i> Kembali</a>

        <div class="row mt-4">
            <div class="col-12 col-md-4 col-lg-12 m-auto">
                <article class="article article-style-c">
                    <div class="article-header">
                        <div class="article-details">
                            <div class="article-category"><a href="#">{{ $data->id_organisasi }}</a><div class="bullet"></div>
                                <a href="#">{{ $data->nama_divisi }}</a>
                            </div>
                            <p>
                                {{ $data->nama_divisi }}
                            </p>
                        </div>
                    </div>
                </article>
            </div>
        </div>
    </section>
</div>
@endsection