@extends('layouts.user.main')

@section('content')

<div class="container mx-auto mt-10">
    <div class="text-center">
        <img src="{{ asset('storage/' . $organisasi->logo) }}" alt="{{ $organisasi->nama }}" class="w-40 h-40 mx-auto rounded-full shadow-md">
        <h1 class="text-3xl font-bold mt-4">{{ $organisasi->nama }}</h1>
        <p class="text-gray-600 mt-2">{{ $organisasi->deskripsi }}</p>
    </div>

    <div class="mt-10">
        <h2 class="text-2xl font-bold">Visi</h2>
        <p class="text-gray-600 mt-2">{{ $organisasi->visi }}</p>
    </div>

    <div class="mt-6">
        <h2 class="text-2xl font-bold">Misi</h2>
        <ul class="list-disc pl-6 mt-2">
            @foreach (json_decode($organisasi->misi) as $misi)
                <li class="text-gray-600">{{ $misi }}</li>
            @endforeach
        </ul>
    </div>
</div>

@endsection
