<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $news = Berita::with('organisasi')->get();
        return view('pages.user.berita.index', compact('news'));
    }

    public function detail($id)
    {
        $news = Berita::with('organisasi')->findOrFail($id);
        return view('pages.user.berita.detail', compact('news'));
    }
}
