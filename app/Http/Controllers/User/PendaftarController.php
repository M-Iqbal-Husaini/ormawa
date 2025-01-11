<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Divisi;
use App\Models\Organisasi;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class PendaftarController extends Controller
{
    public function create()
    {
        $organisasi = Organisasi::all();
        $divisi = Divisi::all();

        // Divisi hanya diambil setelah organisasi dipilih (melalui AJAX)
        return view('pages.user.pendaftaran.create', compact('organisasi','divisi'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nim' => 'nullable|string|max:50',
            'email' => 'required|email|unique:pendaftarans,email',
            'no_hp' => 'required|string|max:15',
            'alamat' => 'required|string',
            'prodi' => 'required|string|max:255',
            'jurusan' => 'required|string|max:255',
            'tahun_kepengurusan' => 'required|integer|min:1900|max:' . date('Y'),
            'jabatan' => 'required|in:anggota',
            'id_divisi' => 'nullable|integer|exists:divisis,id',
            'id_organisasi' => 'nullable|integer|exists:organisasis,id',
            'status' => 'required|in:aktif,non aktif',
        ]);

        Pendaftaran::create($request->all());

        return redirect()->route('pendaftarans.index')->with('success', 'Pendaftaran berhasil ditambahkan.');
    }
}
