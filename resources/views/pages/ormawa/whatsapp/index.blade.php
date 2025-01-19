@extends('layouts.ormawa.main')
@section('title', 'Link WA')
@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Link WA</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('ormawa.dashboard') }}">Dashboard</a></div>
                <div class="breadcrumb-item">Link WA</div>
            </div>
        </div>

        <a href="{{ route('whatsapp.create') }}" class="btn btn-icon icon-left btn-primary"><i class="fas fa-plus"></i> Link WA</a>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-md">
                    <tr>
                        <th>#</th>
                        <th>Link WA</th>
                        <th>Action</th>
                    </tr>
                    @php $no = 0; @endphp
                    @forelse ($data as $item)
                        <tr>
                            <td>{{ $no += 1 }}</td>
                            <td>{{ $item->link }}</td>
                            <td>
                                <!-- Dropdown for Actions -->
                                <div class="dropdown">
                                    <button class="btn btn-primary dropdown-toggle" type="button" id="actionDropdown{{ $item->id }}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Aksi
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="actionDropdown{{ $item->id }}">
                                        <a href="{{ route('whatsapp.edit', $item->id) }}" class="dropdown-item"><i class="fas fa-edit"></i> Edit</a>
                                        <form action="{{ route('whatsapp.delete', $item->id) }}" method="POST" style="display: inline;">
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
                            <td colspan="6" class="text-center">Link WA Kosong</td>
                        </tr>
                    @endforelse
                </table>
            </div>
        </div>
    </section>
</div>
@endsection
