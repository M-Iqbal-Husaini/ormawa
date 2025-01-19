@extends('layouts.user.main')

@section('content')
<section class="banner-area" style="background-image: url('{{ asset('assets/templates/logo/logo.jpeg') }}'); background-size: cover; background-position: center; height: 300px;"></section>

<div class="container mx-auto mt-10">
    <div class="text-center">
        <img src="{{ asset('storage/' . $organisasi->logo) }}" alt="{{ $organisasi->nama }}" class="w-40 h-40 mx-auto rounded-full shadow-md">
        <h1 class="text-4xl font-extrabold mt-6 text-blue-600">Pengumuman Pendaftaran</h1>
    </div>

    <!-- Pencarian dan Tombol Download -->
    <div class="flex justify-between items-center mt-8">
        <!-- Tombol Download -->
        <a href="{{ route('organisasi.downloadPdf', $organisasi->id) }}" class="bg-blue-600 text-white py-2 px-6 rounded-lg shadow-lg hover:bg-blue-700 transition duration-200">
            <i class="fas fa-download"></i> Download PDF
        </a>
    </div>

    <!-- Tabel Data Pendaftaran -->
    <div class="mt-10">
        @if ($pendaftaran && count($pendaftaran) > 0)
            <div class="overflow-x-auto">
                <table class="table-auto w-full border-collapse border border-gray-300 shadow-lg">
                    <thead>
                        <tr class="bg-blue-500 text-white">
                            <th class="border border-gray-300 px-4 py-2 text-center">No</th>
                            <th class="border border-gray-300 px-4 py-2 text-center">Nama</th>
                            <th class="border border-gray-300 px-4 py-2 text-center">NIM</th>
                            <th class="border border-gray-300 px-4 py-2 text-center">Prodi</th>
                            <th class="border border-gray-300 px-4 py-2 text-center">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pendaftaran as $index => $item)
                            <tr class="text-center {{ $loop->even ? 'bg-gray-100' : '' }}">
                                <td class="border border-gray-300 px-4 py-2">{{ $index + 1 }}</td>
                                <td class="border border-gray-300 px-4 py-2">{{ $item->nama }}</td>
                                <td class="border border-gray-300 px-4 py-2">{{ $item->nim }}</td>
                                <td class="border border-gray-300 px-4 py-2">{{ $item->prodi }}</td>
                                <td class="border border-gray-300 px-4 py-2">{{ $item->status_daftar }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="text-center text-gray-600">
                <p>Belum ada pendaftar yang diterima untuk organisasi ini.</p>
            </div>
        @endif
    </div>

    <!-- Pagination -->
    <div class="mt-8 flex justify-center">
        {{ $pendaftaran->links('vendor.pagination.tailwind') }}
    </div>

    <!-- Tombol Kembali ke Detail Organisasi -->
    <div class="d-flex justify-content-center mt-3">
        <a href="{{ route('organisasi.detail', ['id' => $organisasi->id]) }}" class="btn btn-lg btn-primary px-5">
            <i class="bi bi-arrow-left-circle me-2"></i> Kembali ke Detail Organisasi
        </a>
    </div>
</div><br>
@endsection
