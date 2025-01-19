@extends('layouts.guest.main')

@section('content')

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const filterButtons = document.querySelectorAll('.filter-button');
        const beritaItems = document.querySelectorAll('.berita-item');

        filterButtons.forEach(button => {
            button.addEventListener('click', function() {
                const category = this.getAttribute('data-category');

                beritaItems.forEach(item => {
                    const itemCategory = item.getAttribute('data-category');

                    if (category === 'all' || itemCategory === category) {
                        item.style.display = 'block';
                    } else {
                        item.style.display = 'none';
                    }
                });
            });
        });
    });
</script>

<section class="banner-area" style="background-image: url('{{ asset('assets/templates/logo/logo.jpeg') }}'); background-size: cover; background-position: center; height: 300px;"></section>

<div class="text-center" style="height: 100px;">
  <br><br>
    <h1 class="text-2xl font-bold mb-2 text-black">News</h1>
    <p class="text-base text-gray-500">Temukan informasi terkini dari ORMAWA Politeknik Negeri Bengkalis</p>
</div>
<br><br>

<section class="container mx-auto px-4 py-6">
  <div class="bg-white rounded-lg p-4 shadow-md mb-6 flex justify-between items-center">
    <form action="{{ route('guest.berita') }}" method="GET" class="flex items-center gap-2 ml-auto">
      <input type="text" name="search" placeholder="Cari..." value="{{ request('search') }}" class="w-48 p-2 text-sm rounded-lg bg-gray-100 text-gray-800 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500">
      <button type="submit" class="bg-blue-500 text-white px-3 py-2 rounded-lg text-sm hover:bg-blue-600 transition">Search</button>
    </form>
  </div>

  <!-- Filter Kategori -->
  <div class="mb-6 text-center">
    <button class="filter-button bg-blue-500 text-white px-4 py-2 rounded-lg m-2" data-category="all">All Categories</button>
    @foreach ($categories as $category)
      <button class="filter-button bg-gray-200 text-black px-4 py-2 rounded-lg m-2" data-category="{{ $category }}">
        {{ $category }}
      </button>
    @endforeach
  </div>

  <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mx-auto max-w-6xl">
    @foreach ($news as $berita)
      <div class="berita-item bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition transform hover:scale-105" data-category="{{ $berita->organisasi->kategori }}">
        <img src="{{ asset('storage/' . $berita->image) }}" alt="Gambar Berita {{ $berita->judul }}" class="w-full h-32 object-cover">
        <div class="p-3">
          <div class="text-gray-500 text-xs mb-2">
            <i class="far fa-calendar-alt"></i>
            {{ $berita->created_at->format('d M Y') }}
            <i class="fas fa-user ml-2"></i>
            {{ $berita->organisasi->kategori }}
          </div>
          <h2 class="text-sm font-semibold mb-1">
            <a href="{{ route('berita.detail', $berita->id) }}" class="text-gray-800 hover:text-blue-500 transition">
              {{ $berita->judul }}
            </a>
          </h2>
          <p class="text-gray-600 text-xs leading-relaxed">
            {{ Str::limit($berita->deskripsi, 100) }}
          </p>
          <!-- Detail as clickable button -->
          <a href="{{ route('berita.detail', $berita->id) }}" class="inline-block mt-4 px-4 py-2 bg-blue-500 text-white text-xs font-medium rounded-lg hover:bg-blue-600 transition duration-300">
            Detail
          </a>
        </div>
      </div>
    @endforeach

    @if ($news->isEmpty())
      <div class="text-center text-gray-500 font-semibold">
        Tidak ada berita yang ditemukan!
      </div>
    @endif
  </div>

  <div class="mt-8 flex justify-center">
    <div class="inline-flex">
        {{ $news->links('vendor.pagination.tailwind') }}
    </div>
  </div>
</section>

@endsection
