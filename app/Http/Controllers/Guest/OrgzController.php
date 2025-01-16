<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Organisasi;

class OrgzController extends Controller
{
    public function index()
    {
        $organisasi = Organisasi::all();
        return view('pages.guest.organisasi.index', compact('organisasi'));
    }


    public function detail($id)
    {
        $organisasi = Organisasi::find($id);

        // Pastikan misi adalah array, jika disimpan sebagai JSON
        $organisasi->misi = json_decode($organisasi->misi);

        return view('pages.guest.organisasi.detail', compact('organisasi'));
    }
}
