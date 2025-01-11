@extends('layouts.admin.main')
@section('title', 'Admin Edit Organisasi')
@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Edit Organisasi</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
                <div class="breadcrumb-item active"><a href="{{ route('admin.organisasi') }}">Organisasi</a></div>
                <div class="breadcrumb-item">Edit Organisasi</div>
            </div>
        </div>

        <a href="{{ route('admin.organisasi') }}" class="btn btn-icon icon-left btn-warning">Kembali</a>

        <div class="card mt-4">
            <form action="{{ route('organisasi.update', $organisasi->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="customFile">Logo Saat Ini</label><br>
                                <img src="{{ $organisasi->logo ? asset('storage/' . $organisasi->logo) : '#' }}" alt="Logo Organisasi" style="max-height: 150px;">
                            </div>
                            <div class="form-group">
                                <div class="custom-file">
                                    <input class="custom-file-input" name="logo" id="customFile" type="file" onchange="previewImage(event)">
                                    <label class="custom-file-label" for="customFile">Pilih Logo Baru</label>
                                </div>
                                <img id="preview" src="#" alt="Preview Logo" style="display:none; max-height: 150px; margin-top: 10px;">
                                <div class="invalid-feedback">Kolom ini harus di isi! </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="nama">Nama Organisasi</label>
                                <input id="nama" type="text" class="form-control" name="nama" value="{{ $organisasi->nama }}" required="">
                                <div class="invalid-feedback">Kolom ini harus di isi!</div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="kategori">Kategori Organisasi</label>
                                <select id="kategori" name="kategori" class="form-control" required>
                                    <option value="MPM" {{ $organisasi->kategori == 'MPM' ? 'selected' : '' }}>MPM</option>
                                    <option value="BEM" {{ $organisasi->kategori == 'BEM' ? 'selected' : '' }}>BEM</option>
                                    <option value="HMJ" {{ $organisasi->kategori == 'HMJ' ? 'selected' : '' }}>HMJ</option>
                                    <option value="UKM" {{ $organisasi->kategori == 'UKM' ? 'selected' : '' }}>UKM</option>
                                </select>
                                <div class="invalid-feedback">Kolom ini harus diisi!</div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="deskripsi">Deskripsi Organisasi</label>
                                <input id="deskripsi" type="text" class="form-control" name="deskripsi" value="{{ $organisasi->deskripsi }}" required="">
                                <div class="invalid-feedback">Kolom ini harus di isi!</div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="visi">Visi Organisasi</label>
                                <textarea id="visi" class="form-control" name="visi" required>{{ $organisasi->visi }}</textarea>
                                <div class="invalid-feedback">Kolom ini harus di isi!</div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="misi">Misi Organisasi</label>
                                <textarea id="misi" class="form-control" name="misi" required>{{ $organisasi->misi }}</textarea>
                                <div class="invalid-feedback">Kolom ini harus di isi!</div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-icon icon-left btn-primary">
                        <i class="fas fa-save"></i> Simpan
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
