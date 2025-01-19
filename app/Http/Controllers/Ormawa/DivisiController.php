<?php

namespace App\Http\Controllers\Ormawa;

use App\Http\Controllers\Controller;
use App\Models\Divisi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class DivisiController extends Controller
{
    public function index()
    {
        $id_organisasi = session('id_organisasi');

        if (!$id_organisasi) {
            return redirect('/login')->withErrors('ID organisasi tidak ditemukan dalam sesi. Silakan login ulang.');
        }

        $data = Divisi::where('id_organisasi', $id_organisasi)->get();

        return view('pages.ormawa.divisi.index', compact('data'));
    }

    public function create()
    {
        return view('pages.ormawa.divisi.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_divisi' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            Alert::error('Gagal!', 'Pastikan semua terisi dengan benar!');
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $id_organisasi = session('id_organisasi');

        if (!$id_organisasi) {
            Alert::error('Gagal!', 'ID organisasi tidak ditemukan dalam sesi.');
            return redirect()->back();
        }

        $divisi = Divisi::create([
            'nama_divisi' => $request->nama_divisi,
            'id_organisasi' => $id_organisasi,
        ]);

        if ($divisi) {
            Alert::success('Berhasil!', 'Divisi berhasil ditambahkan.');
            return redirect()->route('ormawa.divisi');
        } else {
            Alert::error('Gagal!', 'Divisi gagal ditambahkan.');
            return redirect()->back();
        }
    }

    public function edit($id)
    {
        $divisi = Divisi::findOrFail($id);

        if ($divisi->id_organisasi != session('id_organisasi')) {
            Alert::error('Error!', 'Anda tidak berhak mengakses data ini.');
            return redirect()->route('ormawa.divisi');
        }

        return view('pages.ormawa.divisi.edit', compact('divisi'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nama_divisi' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            Alert::error('Gagal!', 'Pastikan semua terisi dengan benar!');
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $divisi = Divisi::findOrFail($id);

        if ($divisi->id_organisasi != session('id_organisasi')) {
            Alert::error('Error!', 'Anda tidak berhak mengakses data ini.');
            return redirect()->route('ormawa.divisi');
        }

        $divisi->update([
            'nama_divisi' => $request->nama_divisi,
        ]);

        Alert::success('Berhasil!', 'Divisi berhasil diperbarui.');
        return redirect()->route('ormawa.divisi');
    }

    public function delete($id)
    {
        $divisi = Divisi::findOrFail($id);

        if ($divisi->id_organisasi != session('id_organisasi')) {
            Alert::error('Error!', 'Anda tidak berhak mengakses data ini.');
            return redirect()->route('ormawa.divisi');
        }

        $divisi->delete();

        Alert::success('Berhasil!', 'Divisi berhasil dihapus.');
        return redirect()->route('ormawa.divisi');
    }

    public function detail ($id)
    {
        $data = Divisi::with('organisasi')->findOrFail($id);

        return view('pages.ormawa.divisi.detail', compact('data'));
    }
}
