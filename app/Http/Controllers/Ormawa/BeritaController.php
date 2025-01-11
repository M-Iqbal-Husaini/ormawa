<?php

namespace App\Http\Controllers\Ormawa;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use App\Models\Organisasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class BeritaController extends Controller
{
    public function index()
    {
        $id_organisasi = session('id_organisasi');

        // Cek apakah id_organisasi tersedia dalam sesi
        if (!$id_organisasi) {
            return redirect('/login')->withErrors('ID organisasi tidak ditemukan dalam sesi. Silakan login ulang.');
        }

        // Filter berita berdasarkan id_organisasi
        $berita = Berita::where('id_organisasi', $id_organisasi)->get();

        return view('pages.ormawa.berita.index', compact('berita'));
    }


    public function create()
    {
        $organisasi = Organisasi::all();
        return view('pages.ormawa.berita.create', compact('organisasi'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'penulis' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            Alert::error('Gagal!', 'Pastikan semua terisi dengan benar!');
            return redirect()->back();
        }

        // Mengambil id_organisasi dari session
        $id_organisasi = session('id_organisasi');

        if (!$id_organisasi) {
            return redirect('/login')->withErrors('ID organisasi tidak ditemukan dalam sesi. Silakan login ulang.');
        }

        // Proses upload gambar
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        }

        $berita = Berita::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'image' => $imagePath ?? null, // Jika ada gambar, simpan pathnya
            'penulis' => $request->penulis,
            'id_organisasi' => $id_organisasi, // Menggunakan session id_organisasi
        ]);

        if ($berita) {
            Alert::success('Berhasil!', 'Berita berhasil ditambahkan!');
            return redirect()->route('ormawa.berita');
        } else {
            Alert::error('Gagal!', 'Berita gagal ditambahkan');
            return redirect()->back();
        }
    }

    public function edit($id)
    {
        $berita = Berita::findOrFail($id);
        $organisasi = Organisasi::all();
        return view('pages.ormawa.berita.edit', compact('berita', 'organisasi'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'penulis' => 'required|string|max:255',
            'id_organisasi' => 'required|exists:organisasis,id',
        ]);

        if ($validator->fails()) {
            Alert::error('Gagal!', 'Pastikan semua terisi dengan benar!');
            return redirect()->back();
        }

        $berita = Berita::findOrFail($id);

        // Proses upload gambar jika ada
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $berita->image = $imagePath; // Update gambar
        }

        $berita->update([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'penulis' => $request->penulis,
            'id_organisasi' => $request->id_organisasi,
        ]);

        if ($berita) {
            Alert::success('Berhasil!', 'Berita berhasil diperbarui!');
            return redirect()->route('ormawa.berita.index');
        } else {
            Alert::error('Gagal!', 'Berita gagal diperbarui!');
            return redirect()->back();
        }
    }

    public function delete($id)
    {
        $berita = Berita::findOrFail($id);
        $berita->delete();

        if ($berita) {
            Alert::success('Berhasil', 'Berita berhasil dihapus!');
            return redirect()->route('ormawa.berita.index');
        } else {
            Alert::error('Gagal!', 'Berita gagal dihapus!');
            return redirect()->route('ormawa.berita.index');
        }
    }
}
