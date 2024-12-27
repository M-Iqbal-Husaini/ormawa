@extends('layouts.ormawa.main')
@section('title', 'Admin Ormawa')
@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Informasi Organisasi</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
                <div class="breadcrumb-item">Informasi Organisasi</div>
            </div>
        </div>

        {{-- <a href="{{ route('ormawa.create') }}" class="btn btn-icon icon-left btn-primary"><i class="fas fa-plus"></i> Admin Ormawa</a> --}}

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-md">
                    <tr>
                        <th>#</th>
                        <th>Logo</th>
                        <th>Nama Organisasi</th>
                        <th>Deskripsi</th>
                    </tr>
                    @php $no = 0; @endphp
                    @forelse ($data as $item)
                        <tr>
                            <td>{{ $no += 1 }}</td>
                            <td>{{ $item->logo }}</td>
                            <td>{{ $item->nama }} </td>
                            <td>{{ $item->deskripsi }}</td>
                            {{-- <td>
                                <a href="{{ route('ormawa.detail', $item->id) }}" class="badge badge-info">Detail</a>
                                <a href="{{ route('ormawa.edit', $item->id) }}" class="badge badge-warning">Edit</a>
                                <form action="{{ route('ormawa.delete', $item->id) }}" method="POST" style="display: inline;" >
                                    @csrf
                                    @method('DELETE')
                                    <a href="javascript:void(0);" class="badge badge-danger" onclick="this.closest('form').submit();">Hapus</a>
                                </form>
                            </td> --}}
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">Data Admin Organisasi Kosong</td>
                        </tr>
                    @endforelse
                </table>
            </div>
        </div>
    </section>
</div>
@endsection
