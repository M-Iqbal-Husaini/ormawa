@extends('layouts.ormawa.main')
@section('title', 'Anggota')
@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Anggota</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('ormawa.dashboard') }}">Dashboard</a></div>
                <div class="breadcrumb-item">Anggota</div>
            </div>
        </div>

        <a href="{{ route('anggota.create') }}" class="btn btn-icon icon-left btn-primary"><i class="fas fa-plus"></i> Tambah Anggota</a>

        <div class="card mt-4">
            <div class="table-responsive">
                <table class="table table-bordered table-md">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Anggota</th>
                            <th>Jabatan </th>
                            <th>Tahun Kepengurusan </th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $no = 0; @endphp
                        @forelse ($data as $item)
                            <tr>
                                <td>{{ $no += 1 }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->jabatan }}</td>
                                <td>{{ $item->tahun_kepengurusan }}</td>

                                <td>
                                    <a href="{{ route('anggota.detail', $item->id) }}" class="badge badge-info">Detail</a>
                                    <a href="{{ route('anggota.edit', $item->id) }}" class="badge badge-warning">Edit</a>
                                    <form action="{{ route('anggota.delete', $item->id) }}" method="POST" style="display: inline;">
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
