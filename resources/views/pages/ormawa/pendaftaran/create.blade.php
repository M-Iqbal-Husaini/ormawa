@extends('layouts.ormawa.main')
@section('title', 'Tambah Pendaftaran')
@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Tambah Pendaftaran</h1>

            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('ormawa.dashboard') }}">Dashboard</a></div>
                <div class="breadcrumb-item active"><a href="{{ route('ormawa.pendaftaran') }}">Pendaftaran</a></div>
                <div class="breadcrumb-item">Tambah Pendaftaran</div>
            </div>
        </div>

        <a href="{{ route('ormawa.pendaftaran') }}" class="btn btn-icon icon-left btn-warning"> Kembali</a>

        <div class="card mt-4">
            <form action="{{ route('pendaftaran.store') }}" class="needs-validation" novalidate="" enctype="multipart/form-data" method="POST">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input id="nama" type="text" class="form-control" name="nama" value="{{ old('nama') }}" required>
                                <div class="invalid-feedback">Kolom ini harus diisi!</div>
                            </div>
                            <div class="form-group">
                                <label for="nim">NIM</label>
                                <input id="nim" type="text" class="form-control" name="nim" value="{{ old('nim') }}" required>
                                <div class="invalid-feedback">Kolom ini harus diisi!</div>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                                <div class="invalid-feedback">Kolom ini harus diisi!</div>
                            </div>
                            <div class="form-group">
                                <label for="no_hp">No HP</label>
                                <input id="no_hp" type="text" class="form-control" name="no_hp" value="{{ old('no_hp') }}" required>
                                <div class="invalid-feedback">Kolom ini harus diisi!</div>
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <input id="alamat" type="text" class="form-control" name="alamat" value="{{ old('alamat') }}" required>
                                <div class="invalid-feedback">Kolom ini harus diisi!</div>
                            </div>
                            <div class="form-group">
                                <label for="prodi">Program Studi</label>
                                <input id="prodi" type="text" class="form-control" name="prodi" value="{{ old('prodi') }}" required>
                                <div class="invalid-feedback">Kolom ini harus diisi!</div>
                            </div>
                            <div class="form-group">
                                <label for="jurusan">Jurusan</label>
                                <input id="jurusan" type="text" class="form-control" name="jurusan" value="{{ old('jurusan') }}" required>
                                <div class="invalid-feedback">Kolom ini harus diisi!</div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="tahun_kepengurusan">Tahun Kepengurusan</label>
                                <input id="tahun_kepengurusan" type="number" class="form-control" name="tahun_kepengurusan" value="{{ old('tahun_kepengurusan') }}" required>
                                <div class="invalid-feedback">Kolom ini harus diisi!</div>
                            </div>
                            <div class="form-group">
                                <label for="id_divisi">Nama Divisi</label>
                                <select id="id_divisi" name="id_divisi" class="form-control" required>
                                    <option value="" selected disabled>Pilih Divisi</option>
                                    @foreach ($divisi as $item)
                                        <option value="{{ $item->id }}" {{ old('id_divisi') == $item->id ? 'selected' : '' }}>
                                            {{ $item->nama_divisi }}
                                        </option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">Kolom ini harus diisi!</div>
                            </div>
                            <input type="hidden" name="id_organisasi" value="{{ $id_organisasi }}"> <!-- ID organisasi otomatis -->
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select id="status" name="status" class="form-control" required>
                                    <option value="aktif" {{ old('status') == 'aktif' ? 'selected' : '' }}>Aktif</option>
                                    <option value="non aktif" {{ old('status') == 'non aktif' ? 'selected' : '' }}>Non Aktif</option>
                                </select>
                                <div class="invalid-feedback">Kolom ini harus diisi!</div>
                            </div>
                        </div>
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
