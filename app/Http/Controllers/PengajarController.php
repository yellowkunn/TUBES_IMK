<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;
use App\Models\Siswa;
use Illuminate\Support\Facades\DB;

class PengajarController extends Controller
{
    // public function dashboardpengajar()
    // {
    //     $kelass = Kelas::all();
    //     return view('pengajar.dashboard', compact('kelass'));
    // }
    public function absensipengajar()
    {
        return view('pengajar.absensi_pengajar');
    }

    public function kelaspengajar(){
        return view('pengajar.kelas_ajar');
    }

    public function detailkelaspengajar(Kelas $kelas)
    {

        $kelasDetail = Kelas::leftJoin('siswa', 'kelas.id_kelas', '=', 'siswa.kelas_id')
        ->select('kelas.*', DB::raw('COUNT(siswa.id_siswa) as total_siswa'))
        ->where('kelas.id_kelas', $kelas->id_kelas)
        ->groupBy('kelas.id_kelas', 'kelas.nama', 'kelas.tingkat_kelas', 'kelas.foto', 'kelas.deskripsi', 'kelas.harga', 'kelas.fasilitas', 'kelas.rentang', 'kelas.jadwal_hari', 'kelas.durasi', 'kelas.dibuat')
        ->first();

        $siswa = Siswa::where('kelas_id', $kelas->id_kelas)->get();

        return view('pengajar.detail_kelas', compact('kelasDetail', 'siswa'));
    }
    public function tambahpertemuanpengajar(Kelas $kelas)
    {
        return view('pengajar.tambah_pertemuan', compact('kelas'));
    }

    public function detailpertemuanpengajar(Kelas $kelas)
    {
        return view('pengajar.detail_pertemuan', compact('kelas'));
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

    public function kirimtambahpertemuan(Request $request)
    {

    }

    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
