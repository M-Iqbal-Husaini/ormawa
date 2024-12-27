<?php

namespace App\Http\Controllers\Ormawa;

use App\Http\Controllers\Controller;
use App\Models\Divisi;
use App\Models\Anggota;
use App\Models\Organisasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class AnggotaController extends Controller
{
    public function index()
    {
        $idOrganisasi = session('id_organisasi'); // Ambil id_organisasi dari sesi
        $idDivisi = request()->get('id_divisi'); // Ambil id_divisi dari request

        // Validasi jika id_divisi ada
        if (!$idDivisi) {
            return redirect()->back()->withErrors('ID divisi tidak ditemukan.');
        }

        $data = DB::table('organisasis')
            ->join('divisis', 'organisasis.id', '=', 'divisis.id_organisasi')
            ->join('anggotas', 'divisis.id', '=', 'anggotas.id_divisi') // Menambahkan relasi divisi ke anggota
            ->where('organisasis.id', $idOrganisasi) // Filter berdasarkan sesi
            ->where('divisis.id', $idDivisi) // Filter berdasarkan divisi yang dipilih
            ->select('organisasis.*', 'divisis.*', 'anggotas.*')
            ->get();

        confirmDelete('Hapus Data!', 'Apakah anda yakin ingin menghapus data ini?');

        return view('pages.ormawa.anggota.index', compact('data'));
    }

    public function create()
    {
        $idOrganisasi = session('id_organisasi');
        $organisasi = Organisasi::where('id', $idOrganisasi)->get();
        $divisi = Divisi::where('id_organisasi', $idOrganisasi)->get(); // Mengambil divisi berdasarkan organisasi

        return view('pages.ormawa.anggota.create', compact('organisasi', 'divisi'));
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'email' => 'required|email:dns|max:255',
            'no_hp' => 'required|numeric',
            'alamat' => 'required|string|max:500',
            'prodi' => 'required|string|max:255',
            'jurusan' => 'required|string|max:255',
            'tahun_kepengurusan' => 'required|numeric|digits:4',
            'jabatan' => 'required|in:ketum,waketum,bendahara,sekretaris,anggota',
            'id_organisasi' => 'required|numeric',
            'status' => 'required|in:aktif,non aktif',
            'id_divisi' => 'required|numeric', // Menambahkan validasi untuk id_divisi
        ]);

        if ($validator->fails()) {
            Alert::error('Gagal!', 'Pastikan semua terisi dengan benar!');
            return redirect()->back();
        }

        $anggota = Anggota::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
            'prodi' => $request->prodi,
            'jurusan' => $request->jurusan,
            'tahun_kepengurusan' => $request->tahun_kepengurusan,
            'jabatan' => $request->jabatan,
            'id_divisi' => $request->id_divisi, // Menyimpan id_divisi
            'id_organisasi' => $request->id_organisasi,
            'status' => $request->status,
        ]);

        if ($anggota) {
            Alert::success('Berhasil!', 'Anggota berhasil ditambahkan!');
            return redirect()->route('ormawa.anggota');
        } else {
            Alert::error('Gagal', 'Anggota gagal ditambahkan');
            return redirect()->back();
        }
    }


    public function edit($id)
    {
        $anggota = Anggota::findOrFail($id);
        $organisasi = Organisasi::where('id', session('id_organisasi'))->get(); // Organisasi berdasarkan sesi
        $divisi = Divisi::where('id_organisasi', session('id_organisasi'))->get(); // Divisi berdasarkan sesi

        return view('pages.ormawa.anggota.edit', compact('anggota', 'organisasi', 'divisi'));
    }


    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'email' => 'required|email:dns|max:255',
            'no_hp' => 'required|numeric',
            'alamat' => 'required|string|max:500',
            'prodi' => 'required|string|max:255',
            'jurusan' => 'required|string|max:255',
            'tahun_kepengurusan' => 'required|numeric|digits:4',
            'jabatan' => 'required|in:ketum,waketum,bendahara,sekretaris,anggota',
            'id_organisasi' => 'required|numeric',
            'status' => 'required|in:aktif,non aktif',
            'id_divisi' => 'required|numeric', // Validasi id_divisi
        ]);

        if ($validator->fails()) {
            Alert::error('Gagal!', 'Pastikan semua terisi dengan benar!');
            return redirect()->back();
        }

        $anggota = Anggota::findOrFail($id);

        $anggota->update([
            'nama' => $request->nama,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
            'prodi' => $request->prodi,
            'jurusan' => $request->jurusan,
            'tahun_kepengurusan' => $request->tahun_kepengurusan,
            'jabatan' => $request->jabatan,
            'id_divisi' => $request->id_divisi, // Memperbarui id_divisi
            'id_organisasi' => $request->id_organisasi,
            'status' => $request->status,
        ]);

        if ($anggota) {
            Alert::success('Berhasil!', 'Anggota berhasil diperbarui!');
            return redirect()->route('ormawa.anggota');
        } else {
            Alert::error('Gagal!', 'Anggota gagal diperbarui!');
            return redirect()->back();
        }
    }



    public function detail($id)
    {
        $data = DB::table('organisasis')
            ->join('divisis', 'organisasis.id', '=', 'divisis.id_organisasi')
            ->join('anggotas', 'divisis.id', '=', 'anggotas.id_divisi') // Menggunakan id_divisi untuk relasi
            ->where('anggotas.id', $id) // Filter berdasarkan anggota yang dimaksud
            ->select('organisasis.*', 'divisis.*', 'anggotas.*')
            ->first();

        return view('pages.ormawa.anggota.detail', compact('data'));
    }


    public function delete($id)
    {
        $anggota = Anggota::findOrFail($id);
        $anggota->delete();

        if ($anggota) {
            Alert::success('Berhasil', 'Anggota berhasil dihapus!');
            return redirect()->back();
        } else {
            Alert::error('Gagal!', 'Anggota gagal dihapus!');
            return redirect()->back();
        }
    }

}
