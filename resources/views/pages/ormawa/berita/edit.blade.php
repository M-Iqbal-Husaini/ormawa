@extends('layouts.ormawa.main')
@section('title', 'Edit Berita')
@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Edit Berita</h1>

            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('ormawa.dashboard') }}">Dashboard</a></div>
                <div class="breadcrumb-item active"><a href="{{ route('ormawa.berita') }}">Berita</a></div>
                <div class="breadcrumb-item">Edit Berita</div>
            </div>
        </div>

        <a href="{{ route('ormawa.berita') }}" class="btn btn-icon icon-left btn-warning"> Kembali</a>

        <div class="card mt-4">
            <form action="{{ route('berita.update', $berita->id) }}" method="POST" class="needs-validation" enctype="multipart/form-data" novalidate="">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="form-group">
                        <label for="judul_berita">Judul Berita</label>
                        <input id="judul_berita" type="text" class="form-control" name="judul_berita" value="{{ $berita->judul_berita }}" required="">
                        <div class="invalid-feedback">Kolom ini harus di isi!</div>
                    </div>
                    <div class="form-group">
                        <label for="konten">Konten Berita</label>
                        <textarea id="konten" class="form-control" name="konten" rows="4" required>{{ $berita->konten }}</textarea>
                        <div class="invalid-feedback">Kolom ini harus di isi!</div>
                    </div>
                    <button type="submit" class="btn btn-icon icon-left btn-primary">
                        <i class="fas fa-save"></i> Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </section>
</div>
@endsection
