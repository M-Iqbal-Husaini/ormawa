@extends('layouts.user.main')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Berita Terbaru</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
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
      <section class="banner-area" style="background-image: url('{{ asset('assets/templates/logo/logo.jpeg') }}'); background-size: cover; background-position: center; height: 150px;"></section>

</head>
<body class="bg-gray-100">
  <section class="banner-area" style="background-image: url('{{ asset('assets/templates/user/img/polbeng1.jpeg') }}'); background-size: cover; background-position: center;"><br><br><br><br><br>
    <div class="container mx-auto px-4 py-12">
      <div class="text-center" style="height: 140px;">
        <h1 class="text-4xl font-bold mb-4 text-white">Berita Terbaru</h1>
        <p class="text-lg text-gray-200">Temukan informasi terkini dari ORMAWA Politeknik Negeri Bengkalis</p>
      </div>
    </div>
  </section>

  <section class="container mx-auto px-4 py-8">
    <div class="bg-white rounded-lg p-4 shadow-md mb-6 flex justify-between items-center">
      <form action="{{ route('user.berita') }}" method="GET" class="flex items-center gap-2">
        <input type="text" name="search" placeholder="Cari..." value="{{ request('search') }}" class="w-48 p-2 text-sm rounded-lg bg-gray-100 text-gray-800 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500">
        <button type="submit" class="bg-blue-500 text-white px-3 py-2 rounded-lg text-sm hover:bg-blue-600 transition">Cari</button>
      </form>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
      @foreach ($news as $berita)
      <div class="berita-item bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition transform hover:scale-105" data-category="{{ $berita->kategori }}">
        <img src="{{ asset('storage/' . $berita->image) }}" alt="Gambar Berita {{ $berita->judul }}" class="w-full h-40 object-cover">
        <div class="p-4">
          <div class="text-gray-500 text-xs mb-2">
            <i class="far fa-calendar-alt"></i>
            {{ $berita->created_at->format('d M Y') }}
            <i class="fas fa-user ml-2"></i>
            {{ $berita->penulis }}
          </div>
          <h2 class="text-sm font-semibold mb-1">
            <a href="{{ route('berita.detail', $berita->id) }}" class="text-gray-800 hover:text-blue-500 transition">
              {{ $berita->judul }}
            </a>
          </h2>
          <p class="text-gray-600 text-xs leading-relaxed">
            {{ Str::limit($berita->deskripsi, 100) }}
          </p>
          <a class="text-blue-500 hover:text-blue-600 transition text-xs font-medium" href="{{ route('berita.detail', $berita->id) }}">
            READ MORE
            <i class="fas fa-arrow-right"></i>
          </a>
        </div>
      </div>
      @endforeach

      @if (count($news) === 0)
      <div class="text-center text-gray-500 font-semibold">
        Tidak ada berita yang ditemuka@extends('layouts.ormawa.main')

@section('title', 'Dashboard')

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>{{ $organisasi->nama }}</h1>
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

        <div class="row mt-4">
            <div class="col-lg-6 col-md-6 col-sm-12">
                @if ($organisasi->visi)
                    <div class="card">
                        <div class="card-body">
                            <h5>Visi</h5>
                            <p>{{ $organisasi->visi }}</p>
                        </div>
                    </div>
                @endif
            </div>

            <div class="col-lg-6 col-md-6 col-sm-12">
                @if ($organisasi->misi)
                    <div class="card">
                        <div class="card-body">
                            <h5>Misi</h5>
                            <ol class="pl-3">
                                @foreach (explode("\n", $organisasi->misi) as $misi)
                                    <li>{{ trim($misi) }}</li>
                                @endforeach
                            </ol>
 </div>
                    </div>
                @endif
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-12">
                <h3>Berita</h3>
                @if ($berita->isEmpty())
                    <p>Tidak ada berita yang tersedia.</p>
                @else
                    <div class="list-group">
                        @foreach ($berita as $item)
                            <div class="list-group-item">
                                <h5>{{ $item->judul }}</h5>
                                <p>{{ $item->deskripsi }}</p>
                                <small>Penulis: {{ $item->penulis }}</small>
                                <div>
                                    <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->judul }}" class="img-fluid" style="max-width: 100px;">
                                </div>
                                <div class="mt-2">
                                    <a href="{{ route('ormawa.berita.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                                    <form action="{{ route('ormawa.berita.delete', $item->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </section>
</div>
@endsectionn!
      </div>
      @endif
    </div>
    <div class="text-center mt-8">
      <!-- Pagination atau elemen lainnya -->
    </div>
  </section>
</body>
</html>
@endsection

