<?php

namespace App\Http\Controllers;

use App\Models\BaruDiakses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Kelas;
use Illuminate\Support\Facades\Auth;
use App\Models\Siswa;
use App\Models\Pengajar;
use App\Models\Pertemuan;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function index()
    {
        try {
            $kelass = Kelas::all();
        } catch (\Exception $e) {
            // Tangani kesalahan koneksi ke database di sini
            return redirect()->back()->with('error', 'Tidak dapat terhubung ke database.');
        }

        if (Auth::check()) {
            $user = Auth::user();
            $role = $user->role;
            $siswas = Siswa::where('pengguna_id', $user->id_pengguna)->with('kelas')->get();
            $siswaStatus = $siswas->pluck('status');
            switch ($role) {


                case 'user':
                    return view('beranda', compact('kelass', 'siswaStatus'));
                case 'admin':
                    $siswas = Siswa::select('kelas_id')->distinct()->get();
                    $kelas_ids = $siswas->pluck('kelas_id')->toArray(); // Ambil semua kelas_id yang unik dan ubah ke dalam array

                    $kelasss = Kelas::leftJoin('siswa', 'kelas.id_kelas', '=', 'siswa.kelas_id')
                        ->select('kelas.*', DB::raw('COUNT(siswa.id_siswa) as total_siswa'))
                        ->whereNotNull('siswa.kelas_id')
                        ->with('siswa')
                        ->whereIn('kelas.id_kelas', $kelas_ids) // Tambahkan kondisi whereIn untuk membatasi hasil query
                        ->groupBy('kelas.id_kelas', 'kelas.nama', 'kelas.tingkat_kelas', 'kelas.foto', 'kelas.deskripsi', 'kelas.harga', 'kelas.fasilitas', 'kelas.rentang', 'kelas.jadwal_hari', 'kelas.durasi', 'kelas.dibuat')
                        ->get();

                    $siswaa = Siswa::all();
                    $pengajarr = Pengajar::distinct()->pluck('pengguna_id');
                    return view('owner.dashboard', compact('kelasss', 'siswaStatus', 'kelass', 'siswaa', 'pengajarr'));


                case 'pengajar':
                    $kelas_id = Pengajar::where('pengguna_id', $user->id_pengguna)->distinct()->pluck('kelas_id');
                    $kelasss = Kelas::leftJoin('siswa', 'kelas.id_kelas', '=', 'siswa.kelas_id')
                        ->select('kelas.*', DB::raw('COUNT(siswa.id_siswa) as total_siswa'))
                        ->withCount('siswa')
                        ->with('siswa') // Menyertakan data siswa secara lengkap
                        ->whereNotNull('siswa.kelas_id')
                        ->whereIn('kelas.id_kelas', $kelas_id)
                        ->groupBy('kelas.id_kelas', 'kelas.nama', 'kelas.tingkat_kelas', 'kelas.foto', 'kelas.deskripsi', 'kelas.harga', 'kelas.fasilitas', 'kelas.rentang', 'kelas.jadwal_hari', 'kelas.durasi', 'kelas.dibuat')
                        ->get();

                    $pertemuan = Pertemuan::where('pengajar_id', $user->id_pengguna)->first();
                    $today = Carbon::today()->toDateString();
                    // Ambil pertemuan terdekat berdasarkan pengajar_id dan tgl_pertemuan
                    $pertemuanSelanjutnya = Pertemuan::where('pengajar_id', $user->id_pengguna)
                        ->where('tgl_pertemuan', '>=', $today)
                        ->orderBy('tgl_pertemuan', 'asc')
                        ->first();

                    $barudiakses = BaruDiakses::where('pengguna_id', $user->id_pengguna)
                        ->orderBy('baru_diakses', 'desc')
                        ->first();
                    return view('pengajar.dashboard', compact('kelasss', 'siswaStatus', 'pertemuan', 'barudiakses', 'pertemuanSelanjutnya'));


                case 'siswa':

                    // Ambil kelasId dari BaruDiakses yang paling baru
                    $barudiakses = BaruDiakses::where('pengguna_id', $user->id_pengguna)
                        ->orderBy('baru_diakses', 'desc')
                        ->first();

                    if ($barudiakses && $barudiakses->pertemuan) {
                        $kelasId = $barudiakses->pertemuan->kelas_id;
                        $pertemuanId = $barudiakses->pertemuan_id;
                    } else {
                        $kelasId = null;
                        $pertemuanId = null;
                    }

                    // Pastikan $pertemuanId tidak null sebelum melakukan kueri
                    if ($kelasId && $pertemuanId) {
                        $pertemuans = Pertemuan::with('materi', 'tugas', 'link')
                            ->where('kelas_id', $kelasId)
                            ->where('id_pertemuan', $pertemuanId)
                            ->get()
                            ->groupBy('pertemuan_ke');
                    } else {
                        $pertemuans = collect(); // Atau nilai default lain, seperti koleksi kosong
                    }


                    // Debug untuk melihat hasilnya


                    $groupedPertemuans = [];

                    foreach ($pertemuans as $pertemuan_ke => $items) {
                        // Gabungkan materi dan tugas
                        $materi = collect();
                        $tugas = collect();
                        $link = collect();

                        foreach ($items as $item) {
                            $materi = $materi->merge($item->materi);
                            $tugas = $tugas->merge($item->tugas);
                            $link = $link->merge($item->link);
                        }

                        // Tambahkan ke array hasil
                        $groupedPertemuans[] = (object) [
                            'id_pertemuan' => $items->first()->id_pertemuan,
                            'pertemuan_ke' => $pertemuan_ke,
                            'judul' => $items->first()->judul,
                            'materi' => $materi,
                            'tugas' => $tugas,
                            'link' => $link,
                        ];
                    }


                    $siswa = Siswa::where('pengguna_id', $user->id_pengguna)->first();
                    if ($siswa) {
                        $status = $siswa->status;
                        if ($status == 'MenungguVerif') {
                            return view('beranda', compact('kelass', 'siswaStatus'));
                        } elseif ($status == 'Aktif' || $status == 'TidakAktif') {
                            return view('siswa.dashboard', compact('siswa', 'siswas', 'barudiakses', 'groupedPertemuans'));
                        }
                    }


                    return redirect()->back();
                default:
                    return redirect()->back();
            }
        } else {
            return view('beranda', compact('kelass'));
        }
    }
}
