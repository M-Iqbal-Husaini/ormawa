@extends('layouts.ormawa.main')
@section('title', 'Tambah Berita')
@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Tambah Berita</h1>
        </div>

        <a href="{{ route('ormawa.berita') }}" class="btn btn-icon icon-left btn-warning"> Kembali</a>

        <div class="card mt-4">
            <form action="{{ route('berita.store') }}" method="POST" class="needs-validation" enctype="multipart/form-data" novalidate="">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="judul">Judul Berita</label>
                        <input id="judul" type="text" class="form-control" name="judul" required="">
                    </div>

                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea id="deskripsi" class="form-control" name="deskripsi" rows="4" required></textarea>
                    </div>

                    <div class="form-group">
                        <label for="penulis">Penulis Berita</label>
                        <input id="penulis" type="text" class="form-control" name="penulis" required="">
                    </div>

                    <div class="form-group">
                        <label for="image">Gambar</label>
                        <input type="file" class="form-control" name="image" required>
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
