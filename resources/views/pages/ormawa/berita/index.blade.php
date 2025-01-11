@extends('layouts.ormawa.main')
@section('title', 'Berita')
@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Berita</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('ormawa.dashboard') }}">Dashboard</a></div>
                <div class="breadcrumb-item">Berita</div>
            </div>
        </div>

        <a href="{{ route('berita.create') }}" class="btn btn-icon icon-left btn-primary"><i class="fas fa-plus"></i> Tambah Berita</a>

        <div class="card mt-4">
            <div class="table-responsive">
                <table class="table table-bordered table-md">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Gambar</th>
                            <th>Judul Berita</th>
                            <th>Deskripsi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $no = 0; @endphp
                        @forelse ($berita as $item)
                            <tr>
                                <td>{{ $no += 1 }}</td>
                                <td>
                                    @if ($item->image)
                                        <img src="{{ asset('storage/' . $item->image) }}" class="card-img-top" alt="Gambar Berita" style="width: 100px; height: auto;">
                                    @else
                                        <span>-</span>
                                    @endif
                                </td>
                                <td>{{ \Illuminate\Support\Str::words($item->judul,5) }}</td>
                                <td>{{ \Illuminate\Support\Str::words($item->deskripsi, 10) }}</td>
                                <td>
                                    <a href="{{ route('berita.detail', $item->id) }}" class="badge badge-info">Detail</a>
                                    <a href="{{ route('berita.edit', $item->id) }}" class="badge badge-warning">Edit</a>
                                    <form action="{{ route('berita.delete', $item->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="badge badge-danger" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">Data anggota kosong</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>
@endsection
