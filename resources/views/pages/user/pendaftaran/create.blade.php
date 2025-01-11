@extends('layouts.user.main')

@section('content')
<div class="container" style="margin-top: 130px;">
    <h3 class="text-center mb-4">Form Pendaftaran Ke Organisasi</h3>
    <form action="{{ route('pendaftaran.store') }}" method="POST">
        @csrf
        <div class="row">
            <!-- Nama -->
            <div class="col-md-6">
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama') }}" required>
                </div>
            </div>

            <!-- NIM -->
            <div class="col-md-6">
                <div class="form-group">
                    <label for="nim">NIM</label>
                    <input type="text" class="form-control" id="nim" name="nim" value="{{ old('nim') }}" required>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Email -->
            <div class="col-md-6">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
                </div>
            </div>

            <!-- No HP -->
            <div class="col-md-6">
                <div class="form-group">
                    <label for="no_hp">No HP</label>
                    <input type="text" class="form-control" id="no_hp" name="no_hp" value="{{ old('no_hp') }}" required>
                </div>
            </div>
        </div>

        <!-- Alamat -->
        <div class="form-group">
            <label for="alamat">Alamat</label>
            <textarea class="form-control" id="alamat" name="alamat" rows="3" required>{{ old('alamat') }}</textarea>
        </div>

        <div class="row">
            <!-- Prodi -->
            <div class="col-md-6">
                <div class="form-group">
                    <label for="prodi">Prodi</label>
                    <input type="text" class="form-control" id="prodi" name="prodi" value="{{ old('prodi') }}" required>
                </div>
            </div>

            <!-- Jurusan -->
            <div class="col-md-6">
                <div class="form-group">
                    <label for="jurusan">Jurusan</label>
                    <input type="text" class="form-control" id="jurusan" name="jurusan" value="{{ old('jurusan') }}" required>
                </div>
            </div>
        </div>

        <!-- Tahun Kepengurusan -->
        <div class="form-group">
            <label for="tahun_kepengurusan">Tahun Kepengurusan</label>
            <input type="number" class="form-control" id="tahun_kepengurusan" name="tahun_kepengurusan" value="{{ old('tahun_kepengurusan') }}" required>
        </div>

        <div class="row">
            <!-- Organisasi -->
            <div class="col-md-6">
                <div class="form-group">
                    <label for="id_organisasi">Organisasi</label>
                    <select class="form-control" id="id_organisasi" name="id_organisasi" required>
                        <option value="">Pilih Organisasi</option>
                        @foreach($organisasi as $org)
                            <option value="{{ $org->id }}" {{ old('id_organisasi') == $org->id ? 'selected' : '' }}>
                                {{ $org->nama }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <!-- Divisi -->
            <div class="col-md-6">
                <div class="form-group">
                    <label for="id_divisi">Divisi</label>
                    <select class="form-control" id="id_divisi" name="id_divisi" required>
                        <option value="">Pilih Divisi</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- Submit Button -->
        <div class="text-center mt-4">
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-paper-plane"></i> Daftar
            </button>
        </div>
    </form>
</div>
@endsection
