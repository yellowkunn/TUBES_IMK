<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;
use Illuminate\Support\Facades\Auth;
use App\Models\Siswa;
use App\Models\Biodata_siswa;
use App\Models\Pengajar;
use App\Models\Absensi;
use App\Models\Pertemuan;
use App\Models\Sertifikat;
use Illuminate\Support\Facades\DB;

class PengajarController extends Controller
{
    // public function dashboardpengajar()
    // {
    //     $kelass = Kelas::all();
    //     return view('pengajar.dashboard', compact('kelass'));
    // }
    public function absensi(Kelas $kelas)
    {
        $siswas = Siswa::where('kelas_id', $kelas->id_kelas)->get();
        $kehadiran_siswa = Absensi::where('kelas_id', $kelas->id_kelas)->get();
        return view('pengajar.absensi_pengajar', compact('kelas', 'siswas', 'kehadiran_siswa'));
    }

    public function raporpengajar(Kelas $kelas)
    {
        $siswas = Siswa::where('kelas_id', $kelas->id_kelas)->get();
        return view('pengajar.siswa_rapor', compact('kelas', 'siswas'));
    }

    public function isirapor(Kelas $kelas, Siswa $siswa)
    {
        return view('pengajar.detail_rapor', compact('kelas', 'siswa'));
    }

    public function kelaspengajar(){
        $user = Auth::user();
        $kelas_ajars = Pengajar::where('pengguna_id', $user->id_pengguna)
            ->with(['kelas' => function($query) {
                $query->select('kelas.*')
                    ->leftJoin('siswa', 'kelas.id_kelas', '=', 'siswa.kelas_id')
                    ->selectRaw('kelas.*, COUNT(siswa.id_siswa) as total_siswa')
                    ->groupBy('kelas.id_kelas');
            }])->get();
        
        return view('pengajar.kelas_ajar', compact('kelas_ajars'));
    }

    public function detailkelaspengajar(Kelas $kelas)
    {

        $kelasDetail = Kelas::leftJoin('siswa', 'kelas.id_kelas', '=', 'siswa.kelas_id')
        ->select('kelas.*', DB::raw('COUNT(siswa.id_siswa) as total_siswa'))
        ->where('kelas.id_kelas', $kelas->id_kelas)
        ->groupBy('kelas.id_kelas', 'kelas.nama', 'kelas.tingkat_kelas', 'kelas.foto', 'kelas.deskripsi', 'kelas.harga', 'kelas.fasilitas', 'kelas.rentang', 'kelas.jadwal_hari', 'kelas.jam', 'kelas.durasi', 'kelas.dibuat')
        ->first();

        $siswa = Siswa::where('kelas_id', $kelas->id_kelas)->get();

        return view('pengajar.detail_kelas', compact('kelasDetail', 'siswa', 'kelas'));
    }
    public function tambahpertemuanpengajar(Kelas $kelas)
    {
        return view('pengajar.tambah_pertemuan', compact('kelas'));
    }

    public function detailpertemuanpengajar(Kelas $kelas)
    {
        return view('pengajar.detail_pertemuan', compact('kelas'));
    }

    public function detail_pertemuan(Pertemuan $pertemuan)
    {
        // Ambil data pertemuan beserta relasinya
        $pertemuan = Pertemuan::with('materi', 'tugas', 'link')
            ->where('id_pertemuan', $pertemuan->id_pertemuan)
            ->first();
        
        // Inisialisasi koleksi untuk menyimpan materi dan tugas
        $materi = collect();
        $tugas = collect();
        $link = collect();
    
        // Gabungkan materi dan tugas dari pertemuan
        if ($pertemuan) {
            $materi = $materi->merge($pertemuan->materi);
            $tugas = $tugas->merge($pertemuan->tugas);
        }
    
        // Buat objek hasil gabungan materi dan tugas
        $groupedPertemuans = (object) [
            'materi' => $materi,
            'tugas' => $tugas,
        ];
    
        // Ambil data pertemuan untuk detail tampilan
        $p1 = Pertemuan::where('id_pertemuan', $pertemuan->id_pertemuan)->first();
        // dd($groupedPertemuans);
    
        // Tampilkan view dengan data yang diperlukan
        return view('pengajar.detail_pertemuan', compact('p1', 'groupedPertemuans'));
    }
    

    public function jadwalpengajar()
    {
        return view('pengajar.jadwal');
    }

    public function sertifikatpengajar()
    {
        $pengajar = Auth::user();
        $sertifikats = Sertifikat::where('pengguna_id', $pengajar->id_pengguna)->get();
        return view('pengajar.sertifikat', compact('sertifikats'));
    }

    public function kirimtambahpertemuan(Request $request)
    {

    }

    // public function destroy(Request $request): RedirectResponse
    // {
    //     Auth::guard('web')->logout();

    //     $request->session()->invalidate();

    //     $request->session()->regenerateToken();

    //     return redirect('/');
    // }
}
