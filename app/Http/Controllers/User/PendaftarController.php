<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Divisi;
use App\Models\User;
use App\Models\Organisasi;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PendaftarController extends Controller
{
    public function create(Request $request, $id_organisasi)
    {
        $organisasi = Organisasi::find($id_organisasi);
        if (!$organisasi) {
            abort(404, 'Organisasi tidak ditemukan.');
        }
        $divisi = Divisi::where('id_organisasi', $id_organisasi)->get();

        return view('pages.user.pendaftaran.create', compact('organisasi', 'divisi'));
    }


    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required|string|max:255',
            'nim' => 'required|string|max:50|unique:pendaftarans,nim',
            'email' => 'required|email|unique:pendaftarans,email',
            'no_hp' => 'required|string|max:15',
            'alamat' => 'required|string',
            'prodi' => 'required|string|max:255',
            'jurusan' => 'required|string|max:255',
            'tahun_kepengurusan' => 'required|integer|min:1900|max:' . date('Y'),
            'jabatan' => 'required|in:anggota',
            'id_divisi' => 'required|integer|exists:divisis,id',
            'id_organisasi' => 'required|integer|exists:organisasis,id',
            'status' => 'required|in:aktif,non aktif',
            'motivasi' => 'required|string|max:1000',
            'cv' => 'required|file|mimes:pdf,doc,docx|max:2048',
        ]);

        try {
            // Cek apakah user sudah ada berdasarkan nama dan email
            $user = User::where('nama', $request->nama)
                        ->where('email', $request->email)
                        ->first();

            // Jika user tidak ada, buat user baru
            if (!$user) {
                $user = User::create([
                    'nama' => $request->nama,
                    'email' => $request->email,
                    'password' => bcrypt(Str::random(12)), // Password sementara
                ]);
            }

            // Proses upload file CV
            $cvPath = $request->file('cv')->store('cv', 'public');

            // Simpan data pendaftaran
            $pendaftaran = Pendaftaran::create([
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
                'motivasi' => $request->motivasi,
                'cv' => $cvPath,
                'id_user' => $user->id, // Menyimpan id_user berdasarkan user yang ditemukan
            ]);

            // Redirect ke halaman sukses
            $organisasi = Organisasi::find($request->id_organisasi);
            Alert::success('Berhasil!', 'Pendaftaran berhasil dilakukan.');
            return redirect()->route('pendaftaran.success', [
                'id_organisasi' => $organisasi->id,
                'email' => $request->email,
            ]);

        } catch (\Exception $e) {
            // Tangkap error dan laporkan
            report($e);
            Alert::error('Gagal!', 'Pendaftaran gagal dilakukan.');
            return redirect()->back()->withErrors(['error' => 'Terjadi kesalahan saat menyimpan data. Silakan coba lagi.']);
        }
    }


    public function success(Request $request)
    {
        // Ambil ID organisasi dan email dari query string
        $idOrganisasi = $request->query('id_organisasi');
        $email = $request->query('email');

        // Cari data organisasi berdasarkan ID
        $organisasi = Organisasi::find($idOrganisasi);

        if (!$organisasi) {
            abort(404, 'Organisasi tidak ditemukan.');
        }

        return view('pages.user.pendaftaran.success', compact('organisasi', 'email'));
    }
}
