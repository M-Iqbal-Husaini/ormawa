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
                    </tr>
                    @php $no = 0; @endphp
                    @forelse ($data as $item)
                        <tr>
                            <td>{{ $no += 1 }}</td>
                            <td>{{ $item->link }}</td>
                            <td>
                                <a href="{{ route('whatsapp.edit', $item->id) }}" class="badge badge-warning">Edit</a>
                                <form action="{{ route('whatsapp.delete', $item->id) }}" method="POST" style="display: inline;" >
                                    @csrf
                                    @method('DELETE')
                                    <a href="javascript:void(0);" class="badge badge-danger" onclick="this.closest('form').submit();">Hapus</a>
                                </form>
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
