<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;

class PengajarController extends Controller
{
    public function dashboardpengajar()
    {
        $kelass = Kelas::all();
        return view('pengajar.dashboard', compact('kelass'));
    }
    public function absensipengajar()
    {
        return view('pengajar.absensi_pengajar');
    }
    public function detailkelaspengajar(Kelas $kelas)
    {
        return view('pengajar.detail_kelas', [
            "kelas" => $kelas
        ]);
    }
    public function tambahpertemuanpengajar()
    {
        return view('pengajar.tambah_pertemuan');
    }
    public function jadwalpengajar()
    {
        return view('pengajar.jadwal');
    }
    public function raporpengajar()
    {
        return view('pengajar.rapor');
    }
    public function sertifikatpengajar()
    {
        return view('pengajar.sertifikat');
    }

    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
