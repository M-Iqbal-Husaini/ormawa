@extends('layouts.ormawa.main')
@section('title', 'Tambah Anggota')
@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Tambah Anggota</h1>

            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('ormawa.dashboard') }}">Dashboard</a></div>
                <div class="breadcrumb-item active"><a href="{{ route('ormawa.anggota') }}">Anggota</a></div>
                <div class="breadcrumb-item">Tambah Anggota</div>
            </div>
        </div>

        <a href="{{ route('ormawa.anggota') }}" class="btn btn-icon icon-left btn-warning"> Kembali</a>

        <div class="card mt-4">
            <form action="{{ route('anggota.store') }}" class="needs-validation" novalidate="" enctype="multipart/form-data" method="POST">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input id="nama" type="text" class="form-control" name="nama" required>
                                <div class="invalid-feedback">Kolom ini harus di isi!</div>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input id="email" type="email" class="form-control" name="email" required>
                                <div class="invalid-feedback">Kolom ini harus di isi!</div>
                            </div>
                            <div class="form-group">
                                <label for="no_hp">No HP</label>
                                <input id="no_hp" type="text" class="form-control" name="no_hp" required>
                                <div class="invalid-feedback">Kolom ini harus di isi!</div>
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <input id="alamat" type="text" class="form-control" name="alamat" required>
                                <div class="invalid-feedback">Kolom ini harus di isi!</div>
                            </div>
                            <div class="form-group">
                                <label for="prodi">Program Studi</label>
                                <input id="prodi" type="text" class="form-control" name="prodi" required>
                                <div class="invalid-feedback">Kolom ini harus di isi!</div>
                            </div>
                            <div class="form-group">
                                <label for="jurusan">Jurusan</label>
                                <input id="jurusan" type="text" class="form-control" name="jurusan" required>
                                <div class="invalid-feedback">Kolom ini harus di isi!</div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="tahun_kepengurusan">Tahun Kepengurusan</label>
                                <input id="tahun_kepengurusan" type="number" class="form-control" name="tahun_kepengurusan" required>
                                <div class="invalid-feedback">Kolom ini harus di isi!</div>
                            </div>
                            <div class="form-group">
                                <label for="jabatan">Jabatan</label>
                                <select id="jabatan" name="jabatan" class="form-control" required>
                                    <option value="ketum">Ketua Umum</option>
                                    <option value="waketum">Wakil Ketua Umum</option>
                                    <option value="bendahara">Bendahara</option>
                                    <option value="sekretaris">Sekretaris</option>
                                    <option value="anggota">Anggota</option>
                                </select>
                                <div class="invalid-feedback">Kolom ini harus di isi!</div>
                            </div>
                            <div class="form-group">
                                <label for="id_divisi">Nama Divisi</label>
                                <select id="id_divisi" name="id_divisi" class="form-control" >
                                    @foreach ($divisi as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama_divisi }}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">Kolom ini harus di isi!</div>
                            </div>
                            <input type="hidden" name="id_organisasi" value="{{ $id_organisasi }}"> <!-- Menyertakan id_organisasi yang sudah ada -->
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select id="status" name="status" class="form-control" required>
                                    <option value="aktif">Aktif</option>
                                    <option value="non aktif">Non Aktif</option>
                                </select>
                                <div class="invalid-feedback">Kolom ini harus di isi!</div>
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
