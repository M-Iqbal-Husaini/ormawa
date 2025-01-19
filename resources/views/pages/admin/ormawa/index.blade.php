@extends('layouts.admin.main')
@section('title', 'Admin Ormawa')
@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Admin Ormawa</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
                <div class="breadcrumb-item">Admin Ormawa</div>
            </div>
        </div>

        <a href="{{ route('ormawa.create') }}" class="btn btn-icon icon-left btn-primary"><i class="fas fa-plus"></i> Admin Ormawa</a>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-md">
                    <tr>
                        <th>#</th>
                        <th>Nama Admin Organisasi</th>
                        <th>Username Admin Organisasi</th>
                        <th>Email Organisasi</th>
                    </tr>
                    @php $no = 0; @endphp
                    @forelse ($data as $item)
                        <tr>
                            <td>{{ $no += 1 }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->username }} </td>
                            <td>{{ $item->email }}</td>
                            <td>
                                <!-- Dropdown for Actions -->
                                <div class="dropdown">
                                    <button class="btn btn-primary dropdown-toggle" type="button" id="actionDropdown{{ $item->id }}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Aksi
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="actionDropdown{{ $item->id }}">
                                        <a href="{{ route('ormawa.detail', $item->id) }}" class="dropdown-item"><i class="fas fa-eye"></i> Detail</a>
                                        <a href="{{ route('ormawa.edit', $item->id) }}" class="dropdown-item"><i class="fas fa-edit"></i> Edit</a>
                                        <form action="{{ route('ormawa.delete', $item->id) }}" method="POST" style="display: inline;">
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
                            <td colspan="6" class="text-center">Data Admin Organisasi Kosong</td>
                        </tr>
                    @endforelse
                </table>
            </div>
        </div>
    </section>
</div>
@endsection
