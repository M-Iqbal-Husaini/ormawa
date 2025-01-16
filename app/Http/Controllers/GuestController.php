<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita;
use App\Models\Organisasi;

class GuestController extends Controller
{
    public function index()
    {
        $news = Berita::latest()->take(3)->get();

        return view('index', compact('news'));
    }

    public function register()
    {
        return view('register');
    }

    public function pendaftaran()
    {
        return view('pendaftaran');
    }

}
