@extends('layouts.ormawa.main')

@section('title', 'Dashboard')

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>{{ $organisasi->nama }}</</h1>
        </div>

        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="card">
                    <div class="card-body text-center">
                        <img src="{{ asset('storage/' . $organisasi->logo) }}" alt="Logo {{ $organisasi->nama }}" class="img-fluid rounded" style="max-width: 200px;">
                    </div>
                </div>
            </div>

            <div class="col-lg-8 col-md-6 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <p>{{ $organisasi->deskripsi }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
