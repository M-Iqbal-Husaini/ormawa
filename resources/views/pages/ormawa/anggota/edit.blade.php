@extends('layouts.ormawa.main')
@section('title', 'Edit Divisi')
@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Edit Divisi</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('ormawa.dashboard') }}">Dashboard</a></div>
                <div class="breadcrumb-item active"><a href="{{ route('ormawa.divisi') }}">Divisi</a></div>
                <div class="breadcrumb-item">Edit Divisi</div>
            </div>
        </div>

        <a href="{{ route('ormawa.divisi') }}" class="btn btn-icon icon-left btn-warning"><i class="fas fa-arrow-left"></i> Kembali</a>

        <div class="card mt-4">
            <form action="{{ route('ormawa.divisi.update', $divisi->id) }}" class="needs-validation" novalidate="" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="form-group">
                        <label for="nama_divisi">Nama Divisi</label>
                        <input id="nama_divisi" type="text" class="form-control" name="nama_divisi" value="{{ $divisi->nama_divisi }}" required>
                        <div class="invalid-feedback">Kolom ini harus diisi!</div>
                    </div>
                    <div class="form-group">
                        <label for="id_organisasi">Organisasi</label>
                        <select name="id_organisasi" class="form-control" required>
                            @foreach ($organisasi as $item)
                                <option value="{{ $item->id }}" {{ $divisi->id_organisasi == $item->id ? 'selected' : '' }}>
                                    {{ $item->nama }}
                                </option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback">Pilih salah satu organisasi!</div>
                    </div>
                    <button type="submit" class="btn btn-icon icon-left btn-primary"><i class="fas fa-save"></i> Simpan</button>
                </div>
            </form>
        </div>
    </section>
</div>
@endsection
