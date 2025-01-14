<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Organisasi;
use Illuminate\Http\Request;

class OrgController extends Controller
{
    public function index()
    {
        $organisasi = Organisasi::all();
        return view('pages.user.organisasi.index', compact('organisasi'));
    }

    public function detail($id)
    {
        $organisasi = Organisasi::find($id);

        // Pastikan misi adalah array, jika disimpan sebagai JSON
        $organisasi->misi = json_decode($organisasi->misi);

        return view('organisasi.detail', compact('organisasi'));
    }

}
