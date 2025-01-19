<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Organisasi;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class OrgController extends Controller
{
    public function index()
    {
        $organisasi = Organisasi::all();
        return view('pages.user.organisasi.index', compact('organisasi'));
    }

    public function detail($id)
    {
        $organisasi = Organisasi::find($id);

        // Pastikan misi adalah array, jika disimpan sebagai JSON
        $organisasi->misi = json_decode($organisasi->misi);

        return view('pages.user.organisasi.detail', compact('organisasi'));
    }

    public function info($id_organisasi)
    {
        $organisasi = Organisasi::findOrFail($id_organisasi);

        // Cek apakah tombol pengumuman harus ditampilkan
        if (!$organisasi->info_button) {
            return redirect()->back()->withErrors('Pengumuman tidak tersedia saat ini.');
        }

        $search = request('search');

        $pendaftaran = $organisasi->pendaftaran()
                                  ->where('status_daftar', 'Diterima')
                                  ->when($search, function ($query, $search) {
                                      $query->where(function ($subQuery) use ($search) {
                                          $subQuery->where('nama', 'like', '%' . $search . '%')
                                                   ->orWhere('nim', 'like', '%' . $search . '%');
                                      });
                                  })
                                  ->paginate(10);

        $pendaftaran->appends(['search' => $search]);

        return view('pages.user.organisasi.info', compact('organisasi', 'pendaftaran'));
    }

    public function downloadPdf($id_organisasi)
    {
        $organisasi = Organisasi::findOrFail($id_organisasi);

        // Ambil data pendaftaran dengan status 'Diterima'
        $pendaftaranDiterima = $organisasi->pendaftaran()
                                          ->where('status_daftar', 'Diterima')
                                          ->get();

        // Periksa apakah ada data
        if ($pendaftaranDiterima->isEmpty()) {
            return back()->with('error', 'Tidak ada pendaftaran dengan status diterima.');
        }

        // Load view dan generate PDF
        $pdf = Pdf::loadView('pages.user.organisasi.pdf', compact('pendaftaranDiterima'));

        // Download PDF
        return $pdf->download('pendaftaran_diterima.pdf');
    }



}
