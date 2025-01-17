<?php

namespace App\Http\Controllers\Ormawa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Link;
use App\Models\Organisasi;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;


class LinkController extends Controller
{
    public function index()
    {
        $id_organisasi = session('id_organisasi');

        if (!$id_organisasi) {
            return redirect('/login')->withErrors('ID organisasi tidak ditemukan dalam sesi. Silakan login ulang.');
        }

        $data = Link::where('id_organisasi', $id_organisasi)->get();

        return view('pages.ormawa.whatsapp.index', compact('data'));
    }

    public function create()
    {
        return view('pages.ormawa.whatsapp.create');
    }

    public function showWhatsAppLinkForm()
    {
        $organisasi = Organisasi::all();
        $whatsappLink = Link::first();  // Get the first link if it exists
        return view('admin.ormawa.whatsapp', compact('organisasi', 'whatsappLink'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'link' => 'required|url|max:255', // Validasi harus URL valid
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

        try {
            // Simpan link WhatsApp ke database
            Link::create([
                'link' => $request->link,
                'id_organisasi' => $id_organisasi,
            ]);

            Alert::success('Berhasil!', 'Link berhasil ditambahkan.');
            return redirect()->route('ormawa.whatsapp');
        } catch (\Exception $e) {
            Alert::error('Gagal!', 'Terjadi kesalahan saat menyimpan link.');
            return redirect()->back()->withInput();
        }
    }

    // Edit function
    public function edit($id)
    {
        $link = Link::findOrFail($id);  // Find the link by ID
        return view('pages.ormawa.whatsapp.edit', compact('link'));
    }

    // Update function
    public function update(Request $request, $id)
    {
        $request->validate([
            'link' => 'required|url',
        ]);

        $link = Link::findOrFail($id);  // Find the link by ID
        $link->update([
            'link' => $request->link,
        ]);

        Alert::success('Berhasil!', 'Link berhasil diubah.');
        return redirect()->route('ormawa.whatsapp.index')->with('success', 'WhatsApp group link updated successfully!');
    }

    // Delete function
    public function delete($id)
    {
        $link = Link::findOrFail($id);  // Find the link by ID
        $link->delete();

        Alert::success('Berhasil!', 'Link berhasil dihapus.');
        return redirect()->route('ormawa.whatsapp.index')->with('success', 'WhatsApp group link deleted successfully!');
    }
}
