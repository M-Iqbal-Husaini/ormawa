<?php

namespace App\Http\Controllers\Ormawa;

use App\Http\Controllers\Controller;
use App\Models\Anggota;
use App\Models\Ormawa;
use App\Models\Organisasi;
use App\Models\User;

use Illuminate\Http\Request;

class AdminOrmawaController extends Controller
{
    public function dashboard()
    {
        $organisasi = Organisasi::count();
        $ormawas = Ormawa::count();
        $anggota = Anggota::count();
        $users = User::count();

        return view('pages.ormawa.index', compact('organisasi', 'ormawas', 'users', 'anggota'));
    }
}
