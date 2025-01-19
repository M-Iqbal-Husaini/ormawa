@extends('layouts.admin.main')
@section('title', 'Admin Organisasi')
@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Organisasi</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
                <div class="breadcrumb-item">Organisasi</div>
            </div>
        </div>

        <a href="{{ route('organisasi.create') }}" class="btn btn-icon icon-left btn-primary"><i class="fas fa-plus"></i> Organisasi</a>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-md">
                    <tr>
                        <th>#</th>
                        <th>Logo Organisasi</th>
                        <th>Nama Organisasi</th>
                        <th>Kategori</th>
                        <th>Deskripsi Organisasi</th>
                        <th>Actions</th>
                    </tr>
                    @php $no = 0; @endphp
                    @forelse ($organisasi as $item)
                        <tr>
                            <td>{{ $no += 1 }}</td>
                            <td>
                                @if ($item->logo)
                                    <img src="{{ asset('storage/' . $item->logo) }}" alt="Logo Organisasi" style="max-height: 100px;">
                                @else
                                    <span>-</span>
                                @endif
                            </td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->kategori }}</td>
                            <td>{{  \Illuminate\Support\Str::words($item->deskripsi, 10) }}</td>
                            <td>
                                <!-- Dropdown for Actions -->
                                <div class="dropdown">
                                    <button class="btn btn-primary dropdown-toggle" type="button" id="actionDropdown{{ $item->id }}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Aksi
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="actionDropdown{{ $item->id }}">
                                        <a href="{{ route('organisasi.show', $item->id) }}" class="dropdown-item"><i class="fas fa-eye"></i> Detail</a>
                                        <a href="{{ route('organisasi.edit', $item->id) }}" class="dropdown-item"><i class="fas fa-edit"></i> Edit</a>
                                        <form action="{{ route('organisasi.delete', $item->id) }}" method="POST" style="display: inline;">
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
                            <td colspan="5" class="text-center">Data Organisasi Kosong</td>
                        </tr>
                    @endforelse
                </table>
            </div>
        </div>
    </section>
</div>
@endsection
