<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Ormawa;
use App\Models\Organisasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class OrmawaController extends Controller
{
    public function index()
    {
        $data = DB::table('organisasis')
        ->join('ormawas', 'organisasis.id', '=', 'ormawas.id_organisasi')
        ->select('organisasis.*', 'ormawas.*')
        ->get();

        confirmDelete('Hapus Data!', 'Apakah anda yakin ingin menghapus data ini?');

        return view('pages.admin.ormawa.index', compact('data'));
    }

    public function create()
    {
        $organisasi = Organisasi::all();

        return view('pages.admin.ormawa.create', compact('organisasi'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_organisasi' => 'required|numeric',
            'name' => 'required',
            'username' => 'required',
            'email' => 'required|email:dns',
            'password' => 'required|min:8|max:15',
        ]);

        if ($validator->fails()) {
            Alert::error('Gagal!', 'Pastikan semua terisi dengan benar!');
            return redirect()->back();
        }

        $ormawas = Ormawa::create([
            'id_organisasi' => $request->id_organisasi,
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        if ($ormawas) {
            Alert::success('Berhasil!', 'Admin Ormawa berhasil ditambahkan!');
            return redirect()->route('admin.ormawa');
        } else {
            Alert::error('Gagal', 'Admin Ormawa gagal ditambahkan');
            return redirect()->back();
        }
    }

    public function edit($id)
    {
        $ormawas = Ormawa::findOrFail($id);
        $organisasi = Organisasi::all();

        return view('pages.admin.ormawa.edit', compact('ormawas','organisasi'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'id_organisasi' => 'required|numeric',
            'name' => 'required',
            'username' => 'required',
            'email' => 'required|email:dns',
            'password' => 'required|min:8|max:15',
        ]);

        if ($validator->fails()) {
            Alert::error('Gagal!', 'Pastikan semua terisi dengan benar!');
            return redirect()->back();
        }

        $ormawas = Ormawa::findOrFail($id);

        $ormawas->update([
            'id_organisasi' => $request->id_organisasi,
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        if ($ormawas) {
            Alert::success('Berhasil!', 'Admin Ormawa berhasil diperbarui!');
            return redirect()->route('admin.ormawa');
        } else {
            Alert::error('Gagal!', 'Admin Ormawa gagal diperbarui!');
            return redirect()->back();
        }
    }

    public function detail($id)
    {
        $data = DB::table('organisasis')
        ->join('ormawas', 'organisasis.id', '=', 'ormawas.id_organisasi')
        ->select('organisasis.*', 'ormawas.*')
        ->first();
        return view('pages.admin.ormawa.detail', compact('data'));
    }

    public function delete($id)
    {
        $ormawas = Ormawa::findOrFail($id);
        $ormawas->delete();

        if ($ormawas) {
            Alert::success('Berhasil', 'Admin Ormawa berhasil dihapus!');
            return redirect()->back();
        } else {
            Alert::error('Gagal!', 'Admin Ormawa gagal dihapus!');
            return redirect()->back();
        }
    }
}
