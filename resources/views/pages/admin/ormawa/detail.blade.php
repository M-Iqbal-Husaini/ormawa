@extends('layouts.admin.main')

@section('title', 'Admin Detail Ormawa')

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Detail Admin Ormawa</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
                <div class="breadcrumb-item active"><a href="{{ route('admin.ormawa') }}">Admin Ormawa</a></div>
                <div class="breadcrumb-item">Detail Admin Ormawa</div>
            </div>
        </div>

        <a href="{{ route('admin.ormawa') }}" class="btn btn-icon icon-left btn-warning mb-4">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>

        <div class="row">
            <!-- Informasi Admin Ormawa -->
            <div class="col-12 col-md-8 col-lg-8 mx-auto">
                <div class="card shadow-lg">
                    <div class="card-header text-center bg-primary text-white">
                        <h4 class="mb-0">{{ $data->name }}</h4>
                        <small class="text-light">Admin dari Organisasi: <strong>{{ $data->organisasi->nama }}</strong></small>
                    </div>
                    <div class="card-body">
                        <!-- Informasi Admin -->
                        <div class="row">
                            <div class="col-md-8">
                                <table class="table table-borderless mt-3">
                                    <tr>
                                        <th style="width: 30%;">Nama Lengkap</th>
                                        <td>: {{ $data->name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Username</th>
                                        <td>: {{ $data->username }}</td>
                                    </tr>
                                    <tr>
                                        <th>Email</th>
                                        <td>: {{ $data->email }}</td>
                                    </tr>
                                    <tr>
                                        <th>Organisasi</th>
                                        <td>: {{ $data->organisasi->nama }}</td>
                                    </tr>
                                    <tr>
                                        <th>Tanggal Bergabung</th>
                                        <td>: {{ \Carbon\Carbon::parse($data->created_at)->format('d-m-Y') }}</td>
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
