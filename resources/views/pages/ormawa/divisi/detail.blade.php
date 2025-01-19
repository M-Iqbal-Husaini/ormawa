@extends('layouts.ormawa.main')

@section('title', 'Admin Detail Divisi')

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Detail Admin Divisi</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
                <div class="breadcrumb-item active"><a href="{{ route('ormawa.divisi') }}">Admin Ormawa</a></div>
                <div class="breadcrumb-item">Detail Admin Divisi</div>
            </div>
        </div>

        <a href="{{ route('ormawa.divisi') }}" class="btn btn-icon icon-left btn-warning mb-4">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>

        <div class="row">
            <!-- Informasi Admin Ormawa -->
            <div class="col-12 col-md-8 col-lg-8 mx-auto">
                <div class="card shadow-lg">
                    <div class="card-header text-center bg-primary text-white">
                        <h4 class="mb-0">{{ $data->nama_divisi }}</h4>
                        <small class="text-light">Divisi dari Organisasi: <strong>{{ $data->organisasi->nama }}</strong></small>
                    </div>
                    <div class="card-body">
                        <!-- Informasi Admin -->
                        <div class="row">
                            <div class="col-md-8">
                                <table class="table table-borderless mt-3">
                                    <tr>
                                        <th style="width: 30%;">Nama Divisi</th>
                                        <td>: {{ $data->nama_divisi }}</td>
                                    </tr>
                                        <th>Organisasi</th>
                                        <td>: {{ $data->organisasi->nama }}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
