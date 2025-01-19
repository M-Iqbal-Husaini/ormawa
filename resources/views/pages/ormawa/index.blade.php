@extends('layouts.ormawa.main')

@section('title', 'Dashboard')

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>{{ $organisasi->nama }}</h1>
        </div>

        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="card">
                    <div class="card-body text-center">
                        <img src="{{ asset('storage/' . $organisasi->logo) }}" alt="Logo {{ $organisasi->nama }}" class="img-fluid rounded" style="max-width: 200px;">
                    </div>
                </div>
            </div>

            <div class="col-lg-8 col-md-6 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <p>{{ $organisasi->deskripsi }}</p>
                    </div>
                </div>
            </div>

            <!-- Visi dan Misi -->
            <div class="grid md:grid-cols-2 gap-8 mt-10">
                <div class="bg-white shadow-md p-6 rounded-lg">
                    <h2 class="text-2xl font-bold text-blue-500"><i class="fas fa-eye"></i> Visi</h2>
                    <p class="text-gray-700 mt-3">{{ $organisasi->visi }}</p>
                </div>
                <div class="bg-white shadow-md p-6 rounded-lg">
                    <h2 class="text-2xl font-bold text-blue-500"><i class="fas fa-tasks"></i> Misi</h2>
                    <ul class="list-disc pl-6 mt-3">
                        @foreach ($organisasi->misi as $misi)
                            <li class="text-gray-700">{{ $misi }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <!-- Pengaturan Tombol Pengumuman -->
            <div class="col-12 mt-10">
                <form action="{{ route('dashboard.infoButton', $organisasi->id) }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="info_button">Tampilkan Pengumuman</label>
                        <select name="info_button" id="info_button" class="form-control">
                            <option value="1" {{ $organisasi->info_button ? 'selected' : '' }}>Ya</option>
                            <option value="0" {{ !$organisasi->info_button ? 'selected' : '' }}>Tidak</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Simpan Pengaturan</button>
                </form>
            </div>
        </div>
    </section>
</div>
@endsection
