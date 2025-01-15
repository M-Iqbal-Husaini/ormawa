@extends('layouts.ormawa.main')
@section('title', 'Tambah Whatsapp')
@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Tambah Whatsapp</h1>
        </div>

        <a href="{{ route('ormawa.whatsapp') }}" class="btn btn-icon icon-left btn-warning">Kembali</a>

        <div class="card mt-4">
            <form action="{{ route('whatsapp.store') }}" method="POST">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="link">WhatsApp Group Link</label>
                        <input type="text" class="form-control" id="link" name="link" value="{{ old('link', $link->link ?? '') }}" required>
                    </div>
                    <button type="submit" class="btn btn-icon icon-left btn-primary">
                        <i class="fas fa-plus"></i> Tambah
                    </button>
                </div>
            </form>
        </div>
    </section>
</div>
@endsection
