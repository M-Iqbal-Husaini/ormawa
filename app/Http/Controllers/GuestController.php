<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function welcome()
    {
        return view('welcome');
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
