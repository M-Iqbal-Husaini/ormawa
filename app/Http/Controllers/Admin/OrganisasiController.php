<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Organisasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
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
        $organisasi = Organisasi::all();

        return view('pages.admin.organisasi.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'logo' => 'nullable|mimes:png,jpeg,jpg',
            'nama' => 'required',
            'deskripsi' => 'required',
        ]);

        if ($validator->fails()) {
            Alert::error('Gagal!', 'Pastikan semua terisi dengan benar!');
            return redirect()->back();
        }

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move('images/logo', $imageName);
        }

        $organisasi = Organisasi::create([
            'logo' => $request->logo,
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
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
            'logo' => 'nullable|mimes:png,jpeg,jpg',
            'nama' => 'required',
            'deskripsi' => 'required',
        ]);

        if ($validator->fails()) {
            Alert::error('Gagal!', 'Pastikan semua terisi dengan benar!');
            return redirect()->back();
        }

        $organisasi = Organisasi::findOrFail($id);

        if ($request->hasFile('image')) {
            $oldPath = public_path('images/logo' . $organisasi->logo);
            if (File::exists($oldPath)) {
                File::delete($oldPath);
            }

            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move('images/', $imageName);
        } else {
            $imageName = $organisasi->logo;
        }

        $organisasi->update([
            'logo' => $request->logo,
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
        ]);

        if ($organisasi) {
            Alert::success('Berhasil!', 'Organisasi berhasil diperbarui!');
            return redirect()->route('admin.organisasi');
        } else {
            Alert::error('Gagal!', 'Organisasi gagal diperbarui!');
            return redirect()->back();
        }
    }

    public function detail($id)
    {
        $organisasi = Organisasi::all();

        return view('pages.admin.organisasi.detail', compact('organisasi'));
    }

    public function delete($id)
    {
        $organisasi = Organisasi::findOrFail($id);
        $organisasi->delete();

        if ($organisasi) {
            Alert::success('Berhasil', 'Organisasi berhasil dihapus!');
            return redirect()->back();
        } else {
            Alert::error('Gagal!', 'Organisasi gagal dihapus!');
            return redirect()->back();
        }
    }
}
