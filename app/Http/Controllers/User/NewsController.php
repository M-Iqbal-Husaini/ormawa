<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $berita = Berita::with('organisasi')->get();
        return view('pages.user.berita.index', compact('berita'));
    }

    public function detail($id)
    {
        $berita = Berita::with('organisasi')->findOrFail($id);
        return view('pages.user.berita.detail', compact('berita'));
    }
}
