<?php

namespace App\Http\Controllers\Ormawa;

use App\Http\Controllers\Controller;
use App\Models\Anggota;
use App\Models\Divisi;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Storage;

class AnggotaController extends Controller
{
    public function index(Request $request)
    {
        $id_organisasi = session('id_organisasi');

        // Validasi sesi organisasi
        if (!$id_organisasi) {
            return redirect('/login')->withErrors('ID organisasi tidak ditemukan dalam sesi. Silakan login ulang.');
        }

        // Query dasar untuk mengambil data berdasarkan id_organisasi
        $query = Pendaftaran::with(['divisi', 'organisasi'])
            ->where('id_organisasi', $id_organisasi);

        // Tambahkan filter pencarian berdasarkan NIM jika ada
        if ($request->has('nim') && $request->nim) {
            $query->where('nim', 'like', '%' . $request->nim . '%');
        }

        // Tambahkan filter pencarian berdasarkan status_daftar jika ada
        if ($request->has('status_daftar') && $request->status_daftar) {
            $query->where('status_daftar', $request->status_daftar);
        }

        // Eksekusi query untuk mendapatkan data
        $data = $query->get();

        return view('pages.ormawa.anggota.index', compact('data'));
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required|string|max:255',
            'nim' => 'required|string|max:50|unique:pendaftarans,nim,' . $id,
            'email' => 'required|email|unique:pendaftarans,email,' . $id,
            'no_hp' => 'required|string|max:15',
            'alamat' => 'required|string',
            'prodi' => 'required|string|max:255',
            'jurusan' => 'required|string|max:255',
            'tahun_kepengurusan' => 'required|integer|min:1900|max:' . date('Y'),
            'jabatan' => 'required|in:anggota',
            'id_divisi' => 'required|integer|exists:divisis,id',
            'status' => 'required|in:aktif,non aktif',
            'motivasi' => 'required|string|max:1000',
            'cv' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
            'nilai' => 'required|string|max:3',
        ]);

        try {
            $pendaftaran = Pendaftaran::findOrFail($id);

            if ($request->hasFile('cv')) {
                if ($pendaftaran->cv) {
                    Storage::disk('public')->delete($pendaftaran->cv);
                }
                $cvPath = $request->file('cv')->store('cv', 'public');
            } else {
                $cvPath = $pendaftaran->cv;
            }

            $pendaftaran->update([
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
                'status' => $request->status,
                'motivasi' => $request->motivasi,
                'cv' => $cvPath,
            ]);

            Alert::success('Data Anggota Berhasil Diubah');
            return redirect()->route('ormawa.anggota')->with('success', 'Pendaftaran berhasil diperbarui.');
        } catch (\Exception $e) {
            report($e);
            Alert::error('Data Anggota Gagal Diubah');
            return redirect()->back()->withErrors(['error' => 'Terjadi kesalahan saat menyimpan data. Silakan coba lagi.']);
        }
    }

    public function delete($id)
    {
        $pendaftaran = Pendaftaran::findOrFail($id);

        if ($pendaftaran->id_organisasi != session('id_organisasi')) {
            Alert::error('Error!', 'Anda tidak berhak mengakses data ini.');
            return redirect()->route('ormawa.anggota');
        }

        $pendaftaran->delete();

        Alert::success('Berhasil!', 'Anggota berhasil dihapus.');
        return redirect()->route('ormawa.pendaftaran');
    }

    public function detail ($id)
    {
        $data = Pendaftaran::findOrFail($id);

        return view('pages.ormawa.anggota.detail', compact('data'));
    }
}
