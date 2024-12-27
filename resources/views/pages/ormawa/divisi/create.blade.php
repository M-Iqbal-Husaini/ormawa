@extends('layouts.ormawa.main')
@section('title', 'Tambah Divisi')
@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Tambah Divisi</h1>
        </div>

        <a href="{{ route('ormawa.divisi') }}" class="btn btn-icon icon-left btn-warning">Kembali</a>

        <div class="card mt-4">
            <form action="{{ route('divisi.store') }}" method="POST">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="nama_divisi">Nama Divisi</label>
                        <input id="nama_divisi" type="text" class="form-control" name="nama_divisi" required>
                        <div class="invalid-feedback">Kolom ini harus diisi!</div>
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
