@extends('layouts.user.main')
@section('content')

<div class="container">
    <h1>Daftar Organisasi</h1>
    <ul>
        @foreach ($organisasi as $org)
            <li>{{ $org->nama }}</li>
        @endforeach
    </ul>
</div>
@endsection
