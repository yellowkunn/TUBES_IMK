<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Kelas;
use Illuminate\Support\Facades\Auth;
use App\Models\Siswa;

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
            // dd($siswaStatus);
            switch ($role) {
                case 'user':
                    return view('beranda', compact('kelass', 'siswaStatus')); 
                case 'admin':
                    return view('owner.dashboard', compact('kelass', 'siswaStatus'));
                case 'pengajar':
                    return view('pengajar.dashboard', compact('kelass', 'siswaStatus'));
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
