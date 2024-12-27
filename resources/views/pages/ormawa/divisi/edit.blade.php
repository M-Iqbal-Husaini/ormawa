@extends('layouts.ormawa.main')
@section('title', 'Edit Divisi')
@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Edit Divisi</h1>
        </div>

        <a href="{{ route('ormawa.divisi') }}" class="btn btn-icon icon-left btn-warning">Kembali</a>

        <div class="card mt-4">
            <form action="{{ route('divisi.update', $divisi->id) }}" method="POST">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="nama_divisi">Nama Divisi</label>
                        <input id="nama_divisi" type="text" class="form-control" name="nama_divisi" value="{{ $divisi->nama_divisi }}" required>
                        <div class="invalid-feedback">Kolom ini harus diisi!</div>
                    </div>
                    <button type="submit" class="btn btn-icon icon-left btn-primary">
                        <i class="fas fa-save"></i> Simpan
                    </button>
                </div>
            </form>
        </div>
    </section>
</div>
@endsection
