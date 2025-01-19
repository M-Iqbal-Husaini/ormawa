<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use App\Models\Organisasi;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $kategoriFilter = $request->input('kategori', 'all'); // Filter kategori (default 'all')

        // Ambil berita berdasarkan kategori dan pencarian
        $news = Berita::when($search, function ($query, $search) {
                return $query->where('judul', 'like', "%{$search}%");
            })
            ->when($kategoriFilter !== 'all', function ($query) use ($kategoriFilter) {
                return $query->whereHas('organisasi', function ($query) use ($kategoriFilter) {
                    $query->where('kategori', $kategoriFilter);
                });
            })
            ->latest()
            ->paginate(6);

        // Ambil semua kategori dari organisasi untuk filter
        $categories = Organisasi::distinct()->pluck('kategori');

        return view('pages.user.berita.index', compact('news', 'categories', 'kategoriFilter'));
    }


    public function detail($id)
    {
        $news = Berita::with('organisasi')->findOrFail($id);
        return view('pages.user.berita.detail', compact('news'));
    }
    public function home()
    {
        // Ambil 5 berita terbaru dari model Berita
        $news = Berita::latest()->take(3)->get();

        // Kirim data ke view
        return view('welcome', compact('news'));
    }

}
