@extends('layouts.ormawa.main')
@section('title', 'Pendaftaran')
@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Pendaftaran</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('ormawa.dashboard') }}">Dashboard</a></div>
                <div class="breadcrumb-item">Pendaftaran</div>
            </div>
        </div>

        <!-- Form Pencarian -->
        <form action="{{ route('ormawa.pendaftaran') }}" method="GET" class="mb-4">
            <div class="row">
                <div class="col-md-4">
                    <input type="text" name="nim" class="form-control" placeholder="Cari berdasarkan NIM" value="{{ request('nim') }}">
                </div>
                <div class="col-md-4">
                    <select name="status_daftar" class="form-control">
                        <option value="">Cari berdasarkan Status</option>
                        <option value="Diterima" {{ request('status_daftar') == 'Diterima' ? 'selected' : '' }}>Diterima</option>
                        <option value="Ditolak" {{ request('status_daftar') == 'Ditolak' ? 'selected' : '' }}>Ditolak</option>
                        <option value="Pending" {{ request('status_daftar') == 'Pending' ? 'selected' : '' }}>Belum Diproses</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i> Cari</button>
                </div>
            </div>
        </form>

        <div class="card">
            <div class="table-responsive">
                <table class="table table-bordered table-md">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Lengkap</th>
                            <th>Nilai</th>
                            <th>CV</th>
                            <th>Status Daftar</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $no = 1; @endphp
                        @forelse ($data as $item)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->nilai }}</td>
                                <td>
                                    @if ($item->cv)
                                        <a href="{{ asset('storage/' . $item->cv) }}" target="_blank" class="badge badge-success">Unduh CV</a>
                                    @else
                                        <span class="badge badge-secondary">Tidak Ada</span>
                                    @endif
                                </td>
                                <td>
                                    <span class="badge {{ $item->status_daftar === 'diterima' ? 'badge-success' : ($item->status_daftar === 'ditolak' ? 'badge-danger' : 'badge-secondary') }}">
                                        {{ ucfirst($item->status_daftar) ?? 'Belum Diproses' }}
                                    </span>
                                </td>
                                <td>
                                    <!-- Dropdown for Actions -->
                                    <div class="dropdown">
                                        <button class="btn btn-primary dropdown-toggle" type="button" id="actionDropdown{{ $item->id }}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Aksi
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="actionDropdown{{ $item->id }}">
                                            <a href="{{ route('pendaftaran.detail', $item->id) }}" class="dropdown-item"><i class="fas fa-eye"></i> Detail</a>
                                            <a href="{{ route('pendaftaran.edit', $item->id) }}" class="dropdown-item"><i class="fas fa-edit"></i> Edit</a>
                                            <a href="{{ route('pendaftaran.tambah-nilai', $item->id) }}" class="dropdown-item"><i class="fas fa-plus"></i> Edit Nilai</a> <!-- New Button -->
                                            <form action="{{ route('pendaftaran.delete', $item->id) }}" method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="dropdown-item text-danger" onclick="return confirm('Yakin ingin menghapus data ini?')">
                                                    <i class="fas fa-trash"></i> Hapus
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">Data anggota kosong</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>
@endsection
