<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Organisasi;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Admin;
use App\Models\Divisi;
use App\Models\Berita;

class UserController extends Controller
{
    public function index()
    {
        $news = Berita::latest()->take(3)->get();

        $organisasi = Organisasi::all();
        return view('pages.user.index', compact('organisasi','news'));
    }

    public function pendaftaran()
    {
        $organisasi = Organisasi::all();
        $divisi = Divisi::all();
        return view('pages.user.pendaftaran.create', compact('organisasi', 'divisi'));
    }

    public function berita()
    {
        return view('pages.user.berita.index');
    }

    public function kegiatan()
    {
        return view('pages.user.kegiatan.index');
    }

    public function logout(Request $request)
    {
        return redirect()->route('welcome');
    }
}
