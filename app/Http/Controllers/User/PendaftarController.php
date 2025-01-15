<?php
namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Divisi;
use App\Models\Organisasi;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class PendaftarController extends Controller
{
    public function create()
    {
        $organisasi = Organisasi::all();
        $divisi = Divisi::all();

        return view('pages.user.pendaftaran.create', compact('organisasi','divisi'));
    }

    public function store(Request $request)
    {
        // Validasi input
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
            'motivasi_masuk' => 'required|string|max:1000',
            'cv' => 'required|file|mimes:pdf,doc,docx|max:2048', // Validasi file CV
        ]);

        // Proses upload CV
        $cvPath = $request->file('cv')->store('cv', 'public');

        // Simpan data pendaftaran
        Pendaftaran::create([
            'nama' => $request->nama,
            'nim' => $request->nim,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
            'prodi' => $request->prodi,
            'jurusan' => $request->jurusan,
            'tahun_kepengurusan' => $request->tahun_kepengurusan,
            'jabatan' => $request->jabatan,
            'id_divisi' => $request->id_divisi,
            'id_organisasi' => $request->id_organisasi,
            'status' => $request->status,
            'motivasi_masuk' => $request->motivasi_masuk,
            'cv' => $cvPath, // Simpan path file CV
        ]);

        // Menampilkan pemberitahuan dengan SweetAlert
        Alert::success('Berhasil!', 'Pendaftaran berhasil ditambahkan.');

        return redirect()->route('pendaftarans.index');
    }
}
