@extends('layouts.user.main')

@section('content')
<section class="banner-area" style="background-image: url('{{ asset('assets/templates/logo/logo.jpeg') }}'); background-size: cover; background-position: center; height: 150px;"></section>

<div class="container mx-auto mt-10">
    <h1 class="text-3xl font-bold text-center">Form Pendaftaran</h1>

    <form action="{{ route('pendaftaran.store') }}" method="POST" enctype="multipart/form-data" class="mt-8">
        @csrf
        <!-- ID Organisasi -->
        <input type="hidden" name="id_organisasi" value="{{ $organisasi->id }}">
        <div class="mb-4">
            <label for="id_organisasi" class="block text-gray-700"> Nama Organisasi</label>
            <input type="hidden" name="id_organisasi" value="{{ $organisasi->id }}">
            <input type="text" class="w-full px-4 py-2 border rounded-lg" value="{{ $organisasi->nama }}" disabled>
        </div>

        <!-- Nama -->
        <div class="mb-4">
            <label for="nama" class="block text-gray-700">Nama Lengkap</label>
            <input type="text" id="nama" name="nama" class="w-full px-4 py-2 border rounded-lg" value="{{ old('nama') }}" required>
            @error('nama') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>

        <!-- NIM -->
        <div class="mb-4">
            <label for="nim" class="block text-gray-700">NIM</label>
            <input type="text" id="nim" name="nim" class="w-full px-4 py-2 border rounded-lg" value="{{ old('nim') }}" required>
            @error('nim') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>

        <!-- Email -->
        <div class="mb-4">
            <label for="email" class="block text-gray-700">Email</label>
            <input type="email" id="email" name="email" class="w-full px-4 py-2 border rounded-lg" value="{{ old('email') }}" required>
            @error('email') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>

        <!-- Nomor HP -->
        <div class="mb-4">
            <label for="no_hp" class="block text-gray-700">Nomor HP</label>
            <input type="text" id="no_hp" name="no_hp" class="w-full px-4 py-2 border rounded-lg" value="{{ old('no_hp') }}" required>
            @error('no_hp') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>

        <!-- Alamat -->
        <div class="mb-4">
            <label for="alamat" class="block text-gray-700">Alamat</label>
            <textarea id="alamat" name="alamat" class="w-full px-4 py-2 border rounded-lg" required>{{ old('alamat') }}</textarea>
            @error('alamat') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>

        <!-- Program Studi -->
        <div class="mb-4">
            <label for="prodi" class="block text-gray-700">Program Studi</label>
            <input type="text" id="prodi" name="prodi" class="w-full px-4 py-2 border rounded-lg" value="{{ old('prodi') }}" required>
            @error('prodi') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>

        <!-- Jurusan -->
        <div class="mb-4">
            <label for="jurusan" class="block text-gray-700">Jurusan</label>
            <input type="text" id="jurusan" name="jurusan" class="w-full px-4 py-2 border rounded-lg" value="{{ old('jurusan') }}" required>
            @error('jurusan') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>

        <!-- Tahun Kepengurusan -->
        <div class="mb-4">
            <label for="tahun_kepengurusan" class="block text-gray-700">Tahun Kepengurusan</label>
            <input type="number" id="tahun_kepengurusan" name="tahun_kepengurusan" class="w-full px-4 py-2 border rounded-lg" value="{{ old('tahun_kepengurusan') }}" min="1900" max="{{ date('Y') }}" required>
            @error('tahun_kepengurusan') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>

        <!-- Divisi -->
        <div class="mb-4">
            <label for="id_divisi" class="block text-gray-700">Divisi</label>
            <select id="id_divisi" name="id_divisi" class="w-full px-4 py-2 border rounded-lg" required>
                <option value="" selected>Pilih Divisi</option>
                @foreach ($divisi as $d)
                    <option value="{{ $d->id }}" {{ old('id_divisi') == $d->id ? 'selected' : '' }}>{{ $d->nama }}</option>
                @endforeach
            </select>
            @error('id_divisi') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>

        <!-- Jabatan -->
        <input type="hidden" name="jabatan" value="anggota">

        <!-- Status -->
        <div class="mb-4">
            <label for="status" class="block text-gray-700">Status</label>
            <select id="status" name="status" class="w-full px-4 py-2 border rounded-lg" required>
                <option value="aktif" {{ old('status') == 'aktif' ? 'selected' : '' }}>Aktif</option>
                <option value="non aktif" {{ old('status') == 'non aktif' ? 'selected' : '' }}>Non Aktif</option>
            </select>
            @error('status') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>

        <!-- Motivasi Masuk -->
        <div class="mb-4">
            <label for="motivasi" class="block text-gray-700">Motivasi Masuk</label>
            <textarea id="motivasi" name="motivasi" class="w-full px-4 py-2 border rounded-lg" required>{{ old('motivasi') }}</textarea>
            @error('motivasi') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>

        <!-- CV -->
        <div class="mb-4">
            <label for="cv" class="block text-gray-700">Unggah CV</label>
            <input type="file" id="cv" name="cv" class="w-full px-4 py-2 border rounded-lg" accept=".pdf,.doc,.docx" required>
            @error('cv') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>

        <!-- Tombol Submit -->
        <button type="submit" class="bg-blue-500 text-white px-6 py-3 rounded-lg hover:bg-blue-600">Submit</button>
    </form>
</div>

@endsection
