@extends('layouts.ormawa.main')
@section('title', 'Detail Anggota')
@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Detail Anggota</h1>

            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('ormawa.dashboard') }}">Dashboard</a></div>
                <div class="breadcrumb-item active"><a href="{{ route('ormawa.anggota') }}">Anggota</a></div>
                <div class="breadcrumb-item">Detail Anggota</div>
            </div>
        </div>

        <a href="{{ route('ormawa.anggota') }}" class="btn btn-icon icon-left btn-warning"><i class="fas fa-arrow-left"></i> Kembali</a>

        <div class="card mt-4">
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <table class="table table-bordered">
                            <tr>
                                <th>Nama</th>
                                <td>{{ $anggota->nama }}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>{{ $anggota->email }}</td>
                            </tr>
                            <tr>
                                <th>No HP</th>
                                <td>{{ $anggota->no_hp }}</td>
                            </tr>
                            <tr>
                                <th>Alamat</th>
                                <td>{{ $anggota->alamat }}</td>
                            </tr>
                            <tr>
                                <th>Program Studi</th>
                                <td>{{ $anggota->prodi }}</td>
                            </tr>
                            <tr>
                                <th>Jurusan</th>
                                <td>{{ $anggota->jurusan }}</td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-6">
                        <table class="table table-bordered">
                            <tr>
                                <th>Tahun Kepengurusan</th>
                                <td>{{ $anggota->tahun_kepengurusan }}</td>
                            </tr>
                            <tr>
                                <th>Jabatan</th>
                                <td>{{ ucfirst($anggota->jabatan) }}</td>
                            </tr>
                            <tr>
                                <th>Nama Divisi</th>
                                <td>{{ $anggota->divisi->nama_divisi ?? 'Tidak ada' }}</td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td>{{ ucfirst($anggota->status) }}</td>
                            </tr>
                        </table>
                    </div>
                </div>

                <div class="form-group mt-4">
                    <a href="{{ route('anggota.edit', $anggota->id) }}" class="btn btn-icon icon-left btn-warning">
                        <i class="fas fa-edit"></i> Edit Anggota
                    </a>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
