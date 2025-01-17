<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Organisasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class OrganisasiController extends Controller
{
    public function index()
    {
        $organisasi = Organisasi::all();

        return view('pages.admin.organisasi.index', compact('organisasi'));
    }

    public function create()
    {
        return view('pages.admin.organisasi.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'logo' => 'nullable|mimes:png,jpeg,jpg|max:2048',
            'nama' => 'required',
            'deskripsi' => 'required',
            'kategori' => 'required',
            'visi' => 'required',
            'misi' => 'required',
        ]);

        if ($validator->fails()) {
            Alert::error('Gagal!', 'Pastikan semua terisi dengan benar!');
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $logoPath = null;
        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('logos', 'public');
        }

        // Mengubah misi menjadi array
        $misiArray = explode("\n", $request->misi);

        $organisasi = Organisasi::create([
            'logo' => $logoPath,
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'kategori' => $request->kategori,
            'visi' => $request->visi,
            'misi' => json_encode($misiArray), // Menyimpan misi dalam format JSON
        ]);

        if ($organisasi) {
            Alert::success('Berhasil!', 'Organisasi berhasil ditambahkan!');
            return redirect()->route('admin.organisasi');
        } else {
            Alert::error('Gagal', 'Organisasi gagal ditambahkan');
            return redirect()->back();
        }
    }


    public function edit($id)
    {
        $organisasi = Organisasi::findOrFail($id);

        return view('pages.admin.organisasi.edit', compact('organisasi'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'logo' => 'nullable|mimes:png,jpeg,jpg|max:2048',
            'nama' => 'required',
            'deskripsi' => 'required',
            'kategori' => 'required',
            'visi' => 'required',
            'misi' => 'required',
        ]);

        if ($validator->fails()) {
            Alert::error('Gagal!', 'Pastikan semua terisi dengan benar!');
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $organisasi = Organisasi::findOrFail($id);

        $logoPath = $organisasi->logo;
        if ($request->hasFile('logo')) {
            if ($logoPath && Storage::exists('public/' . $logoPath)) {
                Storage::delete('public/' . $logoPath);
            }
            $logoPath = $request->file('logo')->store('logos', 'public');
        }

        // Proses upload gambar baru
        $imagePath = $request->file('image')->store('images', 'public');
        $organisasi->logo = $imagePath;

        // Mengubah misi menjadi array
        $misiArray = explode("\n", $request->misi);

        $organisasi->update([
            'logo' => $logoPath,
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'kategori' => $request->kategori,
            'visi' => $request->visi,
            'misi' => json_encode($misiArray), // Menyimpan misi dalam format JSON
        ]);

        if ($organisasi) {
            Alert::success('Berhasil!', 'Organisasi berhasil diperbarui!');
            return redirect()->route('admin.organisasi');
        } else {
            Alert::error('Gagal!', 'Organisasi gagal diperbarui!');
            return redirect()->back();
        }
    }


    public function delete($id)
    {
        $organisasi = Organisasi::findOrFail($id);

        if ($organisasi->logo && Storage::exists('public/' . $organisasi->logo)) {
            Storage::delete('public/' . $organisasi->logo);
        }

        $organisasi->delete();

        if ($organisasi) {
            Alert::success('Berhasil', 'Organisasi berhasil dihapus!');
            return redirect()->back();
        } else {
            Alert::error('Gagal!', 'Organisasi gagal dihapus!');
            return redirect()->back();
        }
    }

    public function show($id)
    {
        $organisasi = Organisasi::findOrFail($id);

        // Pastikan misi adalah array, jika disimpan sebagai JSON
        $organisasi->misi = json_decode($organisasi->misi);

        return view('pages.admin.organisasi.detail', compact('organisasi'));
    }

}
