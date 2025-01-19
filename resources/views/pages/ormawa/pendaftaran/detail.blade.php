@extends('layouts.ormawa.main')
@section('title', 'Detail Pendaftar')
@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Detail Pendaftar</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item"><a href="{{ route('ormawa.dashboard') }}">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="{{ route('ormawa.pendaftaran') }}">Pendaftaran</a></div>
                <div class="breadcrumb-item">Detail Pendaftar</div>
            </div>
        </div>

        <a href="{{ route('ormawa.pendaftaran') }}" class="btn btn-icon icon-left btn-warning mb-4">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>

        <div class="card">
            <div class="card-header">
                <h4>Informasi Pendaftar</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th>Nama</th>
                                    <td>{{ $data->nama }}</td>
                                </tr>
                                <tr>
                                    <th>NIM</th>
                                    <td>{{ $data->nim }}</td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td>{{ $data->email }}</td>
                                </tr>
                                <tr>
                                    <th>No. HP</th>
                                    <td>{{ $data->no_hp }}</td>
                                </tr>
                                <tr>
                                    <th>Alamat</th>
                                    <td>{{ $data->alamat }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th>Program Studi</th>
                                    <td>{{ $data->prodi }}</td>
                                </tr>
                                <tr>
                                    <th>Jurusan</th>
                                    <td>{{ $data->jurusan }}</td>
                                </tr>
                                <tr>
                                    <th>Tahun Kepengurusan</th>
                                    <td>{{ $data->tahun_kepengurusan }}</td>
                                </tr>
                                <tr>
                                    <th>Divisi</th>
                                    <td>{{ $data->divisi->nama_divisi ?? 'Tidak ada' }}</td>
                                </tr>
                                <tr>
                                    <th>Status</th>
                                    <td>
                                        <span class="badge {{ $data->status === 'diterima' ? 'badge-success' : ($data->status === 'ditolak' ? 'badge-danger' : 'badge-secondary') }}">
                                            {{ ucfirst($data->status) ?? 'Belum Diproses' }}
                                        </span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
