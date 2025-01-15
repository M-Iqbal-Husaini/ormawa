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
        // Ambil query pencarian dan kategori dari request
        $search = $request->input('search');
        $kategori = $request->input('kategori');

        // Query dasar
        $query = Berita::with('organisasi');

        // Filter berdasarkan pencarian
        if ($search) {
            $query->where('judul', 'like', '%' . $search . '%')
                  ->orWhere('deskripsi', 'like', '%' . $search . '%');
        }

        // Filter berdasarkan kategori organisasi
        if ($kategori) {
            $query->whereHas('organisasi', function ($q) use ($kategori) {
                $q->where('kategori', $kategori);
            });
        }

        // Dapatkan berita
        $news = $query->get();

        // Ambil semua kategori organisasi untuk dropdown
        $categories = Organisasi::distinct()->pluck('kategori')->toArray();

        return view('pages.user.berita.index', compact('news', 'categories'));
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
