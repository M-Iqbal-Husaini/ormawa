@extends('layouts.ormawa.main')

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Edit Pendaftaran</h1>
        </div>
        <div class="section-body">
            <div class="card">
                <div class="card-header">
                    <h4>Form Edit Pendaftaran</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('pendaftaran.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" id="nama" value="{{ old('nama', $data->nama) }}" required>
                            @error('nama')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="nim">NIM</label>
                            <input type="text" name="nim" class="form-control @error('nim') is-invalid @enderror" id="nim" value="{{ old('nim', $data->nim) }}" required>
                            @error('nim')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" value="{{ old('email', $data->email) }}" required>
                            @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="no_hp">No. HP</label>
                            <input type="text" name="no_hp" class="form-control @error('no_hp') is-invalid @enderror" id="no_hp" value="{{ old('no_hp', $data->no_hp) }}" required>
                            @error('no_hp')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea name="alamat" class="form-control @error('alamat') is-invalid @enderror" id="alamat" required>{{ old('alamat', $data->alamat) }}</textarea>
                            @error('alamat')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="prodi">Prodi</label>
                            <input type="text" name="prodi" class="form-control @error('prodi') is-invalid @enderror" id="prodi" value="{{ old('prodi', $data->prodi) }}" required>
                            @error('prodi')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="jurusan">Jurusan</label>
                            <input type="text" name="jurusan" class="form-control @error('jurusan') is-invalid @enderror" id="jurusan" value="{{ old('jurusan', $data->jurusan) }}" required>
                            @error('jurusan')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="tahun_kepengurusan">Tahun Kepengurusan</label>
                            <input type="number" name="tahun_kepengurusan" class="form-control @error('tahun_kepengurusan') is-invalid @enderror" id="tahun_kepengurusan" value="{{ old('tahun_kepengurusan', $data->tahun_kepengurusan) }}" required>
                            @error('tahun_kepengurusan')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="jabatan">Jabatan</label>
                            <select name="jabatan" id="jabatan" class="form-control @error('jabatan') is-invalid @enderror" required>
                                <option value="anggota" {{ old('jabatan', $data->jabatan) == 'anggota' ? 'selected' : '' }}>Anggota</option>
                            </select>
                            @error('jabatan')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="id_divisi">Divisi</label>
                            <select name="id_divisi" id="id_divisi" class="form-control @error('id_divisi') is-invalid @enderror" required>
                                @foreach($divisi as $div)
                                <option value="{{ $div->id }}" {{ old('id_divisi', $data->id_divisi) == $div->id ? 'selected' : '' }}>
                                    {{ $div->nama }}
                                </option>
                                @endforeach
                            </select>
                            @error('id_divisi')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" id="status" class="form-control @error('status') is-invalid @enderror" required>
                                <option value="aktif" {{ old('status', $data->status) == 'aktif' ? 'selected' : '' }}>Aktif</option>
                                <option value="non aktif" {{ old('status', $data->status) == 'non aktif' ? 'selected' : '' }}>Non Aktif</option>
                            </select>
                            @error('status')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="motivasi">Motivasi</label>
                            <textarea name="motivasi" class="form-control @error('motivasi') is-invalid @enderror" id="motivasi" required>{{ old('motivasi', $data->motivasi) }}</textarea>
                            @error('motivasi')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="cv">CV (Biarkan kosong jika tidak ingin mengganti)</label>
                            <input type="file" name="cv" class="form-control-file @error('cv') is-invalid @enderror" id="cv" accept=".pdf,.doc,.docx">
                            @error('cv')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="{{ route('ormawa.pendaftaran') }}" class="btn btn-secondary">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
