@extends('layouts.ormawa.main')
@section('title', 'Tambah Berita')
@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Tambah Berita</h1>

            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('ormawa.dashboard') }}">Dashboard</a></div>
                <div class="breadcrumb-item active"><a href="{{ route('ormawa.berita') }}">Berita</a></div>
                <div class="breadcrumb-item">Tambah Berita</div>
            </div>
        </div>

        <a href="{{ route('ormawa.berita') }}" class="btn btn-icon icon-left btn-warning"> Kembali</a>

        <div class="card mt-4">
            <form action="{{ route('berita.store') }}" method="POST" class="needs-validation" enctype="multipart/form-data" novalidate="">
                @csrf
                <div class="card-body">
                    <!-- Input for Judul Berita -->
                    <div class="form-group">
                        <label for="judul_berita">Judul Berita</label>
                        <input id="judul_berita" type="text" class="form-control" name="judul_berita" required="">
                        <div class="invalid-feedback">Kolom ini harus di isi!</div>
                    </div>

                    <!-- Textarea for Konten Berita -->
                    <div class="form-group">
                        <label for="konten">Konten Berita</label>
                        <textarea id="konten" class="form-control" name="konten" rows="4" required></textarea>
                        <div class="invalid-feedback">Kolom ini harus di isi!</div>
                    </div>

                    <!-- Dropdown for id_organisasi -->
                    <div class="form-group">
                        <label for="id_organisasi">Pilih Organisasi</label>
                        <select name="id_organisasi" class="form-control" required>
                            @foreach ($organisasi as $item)
                                <option value="{{ $item->id }}">{{ $item->nama }}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback">Kolom ini harus di isi!</div>
                    </div>

                    <button type="submit" class="btn btn-icon icon-left btn-primary">
                        <i class="fas fa-plus"></i> Tambah
                    </button>
                </div>
            </form>
        </div>
    </section>
</div>
@endsection
