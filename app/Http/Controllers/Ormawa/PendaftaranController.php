<?php

namespace App\Http\Controllers\Ormawa;

use App\Http\Controllers\Controller;
use App\Models\Pendaftaran;
use App\Models\Divisi;
use App\Models\Organisasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class PendaftaranController extends Controller
{
    public function index()
    {
        $id_organisasi = session('id_organisasi');

        if (!$id_organisasi) {
            return redirect('/login')->withErrors('ID organisasi tidak ditemukan dalam sesi. Silakan login ulang.');
        }

        $data = Pendaftaran::with(['divisi', 'organisasi'])
            ->where('id_organisasi', $id_organisasi)
            ->get();

        return view('pages.ormawa.pendaftaran.index', compact('data'));
    }

    public function create()
    {
        $id_organisasi = session('id_organisasi');
    
        if (!$id_organisasi) {
            Alert::error('Gagal!', 'ID organisasi tidak ditemukan dalam sesi.');
            return redirect()->back();
        }
    
        // Mengambil data divisi berdasarkan organisasi
        $divisi = Divisi::where('id_organisasi', $id_organisasi)->get();
    
        // Mengambil semua organisasi
        $organisasi = Organisasi::all();
    
        return view('pages.ormawa.pendaftaran.create', compact('divisi', 'organisasi', 'id_organisasi'));
    }
    

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'nim' => 'required|string|max:50',
            'email' => 'required|email|unique:pendaftarans,email',
            'no_hp' => 'required|string|max:15',
            'alamat' => 'required|string|max:255',
            'prodi' => 'required|string|max:255',
            'jurusan' => 'required|string|max:255',
            'tahun_kepengurusan' => 'required|integer',
            'id_divisi' => 'required|exists:divisis,id',
            'status' => 'required|in:aktif,non aktif',

        ]);

        if ($validator->fails()) {
            Alert::error('Gagal!', 'Pastikan semua terisi dengan benar!');
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $pendaftaran = Pendaftaran::create([
            'nama' => $request->nama,
            'nim' => $request->nim,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
            'prodi' => $request->prodi,
            'jurusan' => $request->jurusan,
            'tahun_kepengurusan' => $request->tahun_kepengurusan,
            'id_divisi' => $request->id_divisi,
            'status' => $request->status,
            'id_organisasi' => session('id_organisasi'),
        ]);

        Alert::success('Berhasil!', 'Pendaftar berhasil ditambahkan.');
        return redirect()->route('ormawa.pendaftaran');
    }

    public function edit($id)
    {
        $pendaftaran = Pendaftaran::findOrFail($id);

        if ($pendaftaran->id_organisasi != session('id_organisasi')) {
            Alert::error('Error!', 'Anda tidak berhak mengakses data ini.');
            return redirect()->route('ormawa.pendaftaran');
        }

        $divisi = Divisi::where('id_organisasi', session('id_organisasi'))->get();

        return view('pages.ormawa.pendaftaran.edit', compact('pendaftaran', 'divisi'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'nim' => 'required|string|max:15',
            'email' => 'required|email|unique:pendaftarans,email,' . $id,
            'no_hp' => 'required|string|max:15',
            'alamat' => 'required|string|max:255',
            'prodi' => 'required|string|max:255',
            'jurusan' => 'required|string|max:255',
            'tahun_kepengurusan' => 'required|integer',
            'id_divisi' => 'required|exists:divisis,id',
            'status' => 'required|in:aktif,non aktif',
        ]);

        if ($validator->fails()) {
            Alert::error('Gagal!', 'Pastikan semua terisi dengan benar!');
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $pendaftaran = Pendaftaran::findOrFail($id);

        if ($pendaftaran->id_organisasi != session('id_organisasi')) {
            Alert::error('Error!', 'Anda tidak berhak mengakses data ini.');
            return redirect()->route('ormawa.pendaftaran');
        }

        $pendaftaran->update($request->all());

        Alert::success('Berhasil!', 'Pendaftar berhasil diperbarui.');
        return redirect()->route('ormawa.pendaftaran');
    }

    public function delete($id)
    {
        $pendaftaran = Pendaftaran::findOrFail($id);

        if ($pendaftaran->id_organisasi != session('id_organisasi')) {
            Alert::error('Error!', 'Anda tidak berhak mengakses data ini.');
            return redirect()->route('ormawa.pendaftaran');
        }

        $pendaftaran->delete();

        Alert::success('Berhasil!', 'Pendaftar berhasil dihapus.');
        return redirect()->route('ormawa.pendaftaran');
    }
}
