<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Berita;
use App\Models\Organisasi;

class BrtController extends Controller
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

        return view('pages.guest.berita.index', compact('news', 'categories', 'kategoriFilter'));
    }

    public function detail($id)
    {
        $news = Berita::with('organisasi')->findOrFail($id);
        return view('pages.guest.berita.detail', compact('news'));
    }
}
