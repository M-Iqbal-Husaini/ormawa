@extends('layouts.admin.main')
@section('title', 'Admin Tambah Organisasi')
@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Tambah Organisasi</h1>

            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
                <div class="breadcrumb-item active"><a href="{{ route('admin.organisasi') }}">Organisasi</a></div>
                <div class="breadcrumb-item">Tambah Organisasi</div>
            </div>
        </div>

        <a href="{{ route('admin.organisasi') }}" class="btn btn-icon icon-left btn-warning"> Kembali</a>

        <div class="card mt-4">
            <form action="{{ route('organisasi.store') }}" class="needs-validation" novalidate="" enctype="multipart/form-data" method="POST">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <div class="custom-file">
                                    <input class="custom-file-input" name="image" id="customFile" type="file" required="">
                                    <label class="custom-file-label" for="customFile">Pilih Logo</label>
                                </div>
                                <div class="invalid-feedback">Kolom ini harus di isi! </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="nama">Nama Organisasi</label>
                                <input id="nama" type="text" class="form-control" name="nama" required="">
                                <div class="invalid-feedback">Kolom ini harus di isi!</div>
                            </div>
                        </div><div class="col-6">
                            <div class="form-group">
                                <label for="deskripsi">Deskripsi Organisasi</label>
                                <input id="deskripsi" type="text" class="form-control" name="deskripsi" required="">
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
