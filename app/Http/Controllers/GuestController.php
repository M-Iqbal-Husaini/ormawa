<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita;

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

    public function organisasi()
    {
        return view('organisasi');
    }

    public function berita()
    {
        return view('berita');
    }

    public function login()
    {
        return view('login');
    }


}
