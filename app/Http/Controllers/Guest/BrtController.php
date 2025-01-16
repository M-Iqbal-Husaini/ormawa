<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Berita;

class BrtController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $news = Berita::when($search, function ($query, $search) {
            return $query->where('judul', 'like', "%{$search}%");
        })
        ->latest()
        ->paginate(6); // Menampilkan 6 berita per halaman

        return view('pages.guest.berita.index', compact('news'));
    }

    public function detail($id)
    {
        $news = Berita::with('organisasi')->findOrFail($id);
        return view('pages.guest.berita.detail', compact('news'));
    }
}
