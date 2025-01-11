<?php

namespace App\Http\Controllers\Ormawa;

use App\Http\Controllers\Controller;
use App\Models\Anggota;
use App\Models\Divisi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class AnggotaController extends Controller
{
    public function index()
    {
        $id_organisasi = session('id_organisasi');

        if (!$id_organisasi) {
            return redirect('/login')->withErrors('ID organisasi tidak ditemukan dalam sesi. Silakan login ulang.');
        }

        $data = Anggota::with(['divisi', 'organisasi'])
            ->where('id_organisasi', $id_organisasi)
            ->get();

        return view('pages.ormawa.anggota.index', compact('data'));
    }

    public function create()
    {
        $id_organisasi = session('id_organisasi');

        if (!$id_organisasi) {
            Alert::error('Gagal!', 'ID organisasi tidak ditemukan dalam sesi.');
            return redirect()->back();
        }

        $divisi = Divisi::where('id_organisasi', $id_organisasi)->get();

        return view('pages.ormawa.anggota.create', compact('divisi', 'id_organisasi'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'nim' => 'required|string|max:20|unique:anggotas,nim,' . ($id ?? 'NULL') . ',id',
            'email' => 'required|email|unique:anggotas,email,' . ($id ?? 'NULL') . ',id',
            'no_hp' => 'required|string|max:15',
            'alamat' => 'required|string|max:255',
            'prodi' => 'required|string|max:255',
            'jurusan' => 'required|string|max:255',
            'tahun_kepengurusan' => 'required|integer',
            'jabatan' => 'required|in:ketum,waketum,sekretaris,bendaharara,anggota',
            'id_divisi' => 'nullable|exists:divisis,id',
            'status' => 'required|in:aktif,non aktif',

        ]);

        if ($validator->fails()) {
            Alert::error('Gagal!', 'Pastikan semua terisi dengan benar!');
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $anggota = Anggota::create([
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
            'id_organisasi' => session('id_organisasi'),
        ]);

        Alert::success('Berhasil!', 'Anggota berhasil ditambahkan.');
        return redirect()->route('ormawa.anggota');
    }

    public function edit($id)
    {
        $anggota = Anggota::findOrFail($id);

        if ($anggota->id_organisasi != session('id_organisasi')) {
            Alert::error('Error!', 'Anda tidak berhak mengakses data ini.');
            return redirect()->route('ormawa.anggota');
        }

        $divisi = Divisi::where('id_organisasi', session('id_organisasi'))->get();

        return view('pages.ormawa.anggota.edit', compact('anggota', 'divisi'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'nim' => 'required|string|max:20|unique:anggotas,nim,' . ($id ?? 'NULL') . ',id',
            'email' => 'required|email|unique:anggotas,email,' . ($id ?? 'NULL') . ',id',
            'no_hp' => 'required|string|max:15',
            'alamat' => 'required|string|max:255',
            'prodi' => 'required|string|max:255',
            'jurusan' => 'required|string|max:255',
            'tahun_kepengurusan' => 'required|integer',
            'jabatan' => 'required|in:ketum,waketum,sekretaris,bendaharara,anggota',
            'id_divisi' => 'nullable|exists:divisis,id',
            'status' => 'required|in:aktif,non aktif',
        ]);

        if ($validator->fails()) {
            Alert::error('Gagal!', 'Pastikan semua terisi dengan benar!');
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $anggota = Anggota::findOrFail($id);

        if ($anggota->id_organisasi != session('id_organisasi')) {
            Alert::error('Error!', 'Anda tidak berhak mengakses data ini.');
            return redirect()->route('ormawa.anggota');
        }

        $anggota->update($request->all());

        Alert::success('Berhasil!', 'Anggota berhasil diperbarui.');
        return redirect()->route('ormawa.anggota');
    }

    public function delete($id)
    {
        $anggota = Anggota::findOrFail($id);

        if ($anggota->id_organisasi != session('id_organisasi')) {
            Alert::error('Error!', 'Anda tidak berhak mengakses data ini.');
            return redirect()->route('ormawa.anggota');
        }

        $anggota->delete();

        Alert::success('Berhasil!', 'Anggota berhasil dihapus.');
        return redirect()->route('ormawa.anggota');
    }
}
