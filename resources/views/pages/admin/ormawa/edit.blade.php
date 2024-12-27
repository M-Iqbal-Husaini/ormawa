@extends('layouts.admin.main')
@section('title', 'Admin Edit Ormawa')
@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Edit Admin Ormawa</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
                <div class="breadcrumb-item active"><a href="{{ route('admin.ormawa') }}">Admin Ormawa</a></div>
                <div class="breadcrumb-item">Edit Admin Ormawa</div>
            </div>
        </div>

        <a href="{{ route('admin.ormawa') }}" class="btn btn-icon icon-left btn-warning">Kembali</a>

        <div class="card mt-4">
            <form action="{{ route('admin.ormawa.update', $ormawas->id) }}"
                  class="needs-validation" novalidate="" enctype="multipart/form-data" method="POST">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="id_organisasi">Nama Organisasi</label>
                                <input id="id_organisasi" type="text" class="form-control" name="id_organisasi" required="">
                                <div class="invalid-feedback">Kolom ini harus di isi!
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="name">Nama Admin Ormawa</label>
                                <input id="name" type="text" class="form-control" name="name" required="">
                                <div class="invalid-feedback">Kolom ini harus di isi!</div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="username">Username Admin Ormawa</label>
                                <input id="username" type="text" class="form-control" name="username" required="">
                                <div class="invalid-feedback">Kolom ini harus di isi</div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="email">Email Admin Ormawa</label>
                                <input id="email" type="text" class="form-control" name="email" required="">
                                <div class="invalid-feedback">Kolom ini harus di isi!</div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="password">Password Admin Ormawa</label>
                                <input id="password" type="text" class="form-control" name="password" required="">
                                <div class="invalid-feedback">Kolom ini harus di isi!</div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-icon icon-left btn-primary">
                        <i class="fas fa-save"></i> Simpan
                    </button>
                </div>
            </form>
        </div>
    </section>
</div>
@endsection
