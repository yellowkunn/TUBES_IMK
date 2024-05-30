<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Kelas;
use Illuminate\Support\Facades\Auth;
use App\Models\Siswa;
use App\Models\Pengajar;

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

        if (Auth::check())
        {
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
                            ->whereIn('kelas.id_kelas', $kelas_ids) // Tambahkan kondisi whereIn untuk membatasi hasil query
                            ->groupBy('kelas.id_kelas', 'kelas.nama', 'kelas.tingkat_kelas', 'kelas.foto', 'kelas.deskripsi', 'kelas.harga', 'kelas.fasilitas', 'kelas.rentang', 'kelas.jadwal_hari', 'kelas.durasi', 'kelas.dibuat')
                            ->get();

                        $siswaa = Siswa::all();
                        $pengajarr = Pengajar::distinct()->pluck('pengguna_id');
                        return view('owner.dashboard', compact('kelasss', 'siswaStatus', 'kelass', 'siswaa', 'pengajarr'));

                        
                case 'pengajar':
                    $kelas_id = Pengajar::where('pengguna_id', $user->id_pengguna)->distinct()->pluck('kelas_id');
                    $kelasss = Kelas::whereIn('id_kelas', $kelas_id)->get();
                    return view('pengajar.dashboard', compact('kelasss', 'siswaStatus'));


                case 'siswa':
                    $siswa = Siswa::where('pengguna_id', $user->id_pengguna)->first();
                    if ($siswa) {
                        $status = $siswa->status;
                        if ($status == 'MenungguVerif') {
                            return view('beranda', compact('kelass', 'siswaStatus'));
                        } elseif ($status == 'Aktif' || $status == 'TidakAktif') {
                            return view('siswa.dashboard', compact('siswa', 'siswas'));
                        }
                    }


                    return redirect()->back();
                default:
                    return redirect()->back();
            }
        }
        else 
        {
            return view('beranda', compact('kelass'));
        }
    }
}
