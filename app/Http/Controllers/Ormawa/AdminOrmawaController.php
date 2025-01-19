<?php

namespace App\Http\Controllers\Ormawa;

use App\Http\Controllers\Controller;
use App\Models\Anggota;
use App\Models\Ormawa;
use App\Models\Organisasi;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;
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

        $organisasi->misi = json_decode($organisasi->misi);

        if (!$organisasi) {
            return redirect()->back()->withErrors('Organisasi tidak ditemukan.');
        }

        return view('pages.ormawa.index', compact('organisasi'));
    }

    // Menangani pembaruan status visibilitas pengumuman
    public function infoButton(Request $request, $id_organisasi)
    {
        $organisasi = Organisasi::findOrFail($id_organisasi);
        $organisasi->info_button = $request->info_button;
        $organisasi->save();

        Alert::success('Pengumumuman Berhasil Diubah');
        return redirect()->route('ormawa.dashboard', ['id_organisasi' => $organisasi->id])
                         ->with('status', 'Pengaturan pengumuman berhasil diperbarui');
    }
}
