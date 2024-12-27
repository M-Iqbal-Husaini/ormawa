@extends('layouts.ormawa.main')
@section('title', 'Berita')
@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Berita</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
                <div class="breadcrumb-item">Berita</div>
            </div>
        </div>

        <a href="{{ route('berita.create') }}" class="btn btn-icon icon-left btn-primary"><i class="fas fa-plus"></i> Berita</a>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-md">
                    <tr>
                        <th>#</th>
                        <th>Judul Berita</th>
                        <th>Konten</th>
                        <th>Tanggal</th>
                        <th>Action</th>
                    </tr>
                    @php $no = 0; @endphp
                    @forelse ($berita as $item)
                        <tr>
                            <td>{{ $no += 1 }}</td>
                            <td>{{ $item->judul_berita }}</td>
                            <td>{{ $item->konten }}</td>
                            <td>{{ $item->created_at->format('d-m-Y') }}</td>
                            <td>
                                <a href="{{ route('berita.detail', $item->id) }}" class="badge badge-info">Detail</a>
                                <a href="{{ route('berita.edit', $item->id) }}" class="badge badge-warning">Edit</a>
                                <form action="{{ route('berita.delete', $item->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <a href="javascript:void(0);" class="badge badge-danger" onclick="this.closest('form').submit();">Hapus</a>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">Data Berita Kosong</td>
                        </tr>
                    @endforelse
                </table>
            </div>
        </div>
    </section>
</div>
@endsection
