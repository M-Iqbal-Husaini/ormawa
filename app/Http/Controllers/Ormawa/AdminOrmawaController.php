<?php

namespace App\Http\Controllers\Ormawa;

use App\Http\Controllers\Controller;
use App\Models\Anggota;
use App\Models\Ormawa;
use App\Models\Organisasi;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

use Illuminate\Http\Request;

class AdminOrmawaController extends Controller
{
    public function dashboard()
    {
        $id_organisasi = session('id_organisasi');

        if (!$id_organisasi) {
            return redirect('/login')->withErrors('ID organisasi tidak ditemukan dalam sesi. Silakan login ulang.');
        }

        $organisasi = Organisasi::where('id', $id_organisasi)->first();

        if (!$organisasi) {
            return redirect()->back()->withErrors('Organisasi tidak ditemukan.');
        }

        return view('pages.ormawa.index', compact('organisasi'));
    }
}
