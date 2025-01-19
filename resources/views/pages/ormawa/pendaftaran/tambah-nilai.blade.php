@extends('layouts.ormawa.main')

@section('title', 'Tambah Nilai')

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Tambah Nilai</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('ormawa.dashboard') }}">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="{{ route('ormawa.pendaftaran') }}">Pendaftaran</a></div>
                <div class="breadcrumb-item">Tambah Nilai</div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h4>Form Tambah Nilai untuk {{ $pendaftaran->nama }}</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('pendaftaran.update-nilai', $pendaftaran->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="nilai">Nilai</label>
                        <input type="number" name="nilai" id="nilai" class="form-control" value="{{ old('nilai', $pendaftaran->nilai) }}" required min="0" max="100">
                        @error('nilai')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Simpan Nilai</button>
                        <a href="{{ route('ormawa.pendaftaran') }}" class="btn btn-secondary">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
@endsection
