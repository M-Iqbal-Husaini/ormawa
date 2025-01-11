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
            <form action="{{ route('organisasi.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <div class="custom-file">
                                    <input class="custom-file-input" name="logo" id="customFile" type="file" onchange="previewImage(event)">
                                    <label class="custom-file-label" for="customFile">Pilih Logo</label>
                                </div>
                                <img id="preview" src="#" alt="Preview Logo" style="display:none; max-height: 150px; margin-top: 10px;">
                                <div class="invalid-feedback">Kolom ini harus di isi! </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="nama">Nama Organisasi</label>
                                <input id="nama" type="text" class="form-control" name="nama" required="">
                                <div class="invalid-feedback">Kolom ini harus di isi!</div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="kategori">Kategori Organisasi</label>
                                <select id="kategori" name="kategori" class="form-control" required>
                                    <option value="" disabled selected>Pilih Kategori</option>
                                    <option value="MPM">MPM</option>
                                    <option value="BEM">BEM</option>
                                    <option value="HMJ">HMJ</option>
                                    <option value="UKM">UKM</option>
                                </select>
                                <div class="invalid-feedback">Kolom ini harus di isi!</div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="deskripsi">Deskripsi Organisasi</label>
                                <input id="deskripsi" type="text" class="form-control" name="deskripsi" required="">
                                <div class="invalid-feedback">Kolom ini harus di isi!</div>
                            </div>
                        </div>
                        <div class="row">
                            <!-- Input Visi -->
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="visi">Visi Organisasi</label>
                                    <textarea id="visi" class="form-control" name="visi" required>{{ old('visi') }}</textarea>
                                    <div class="invalid-feedback">Kolom ini harus diisi!</div>
                                </div>
                            </div>
                            <!-- Input Misi -->
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="misi">Misi Organisasi</label>
                                    <textarea id="misi" class="form-control" name="misi" required>{{ old('misi') }}</textarea>
                                    <div class="invalid-feedback">Kolom ini harus diisi!</div>
                                </div>
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

<script>
    function previewImage(event) {
        const preview = document.getElementById('preview');
        preview.src = URL.createObjectURL(event.target.files[0]);
        preview.style.display = 'block';
    }
</script>
@endsection
