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
        $kelass = Kelas::all();

    
        if (Auth::check())
        {
            $user = Auth::user();
            $role = $user->role;
            $siswas = Siswa::where('pengguna_id', $user->id_pengguna)->with('kelas')->get();
            switch ($role) {
                case 'user':
                    return view('beranda', compact('kelass')); 
                case 'admin':
                    return view('owner.dashboard', compact('kelass'));
                case 'pengajar':
                    return view('pengajar.dashboard', compact('kelass'));
                case 'siswa':
                    $siswa = Siswa::where('pengguna_id', $user->id_pengguna)->first();
                    if ($siswa) {
                        $status = $siswa->status;
                        if ($status == 'MenungguVerif') {
                            return view('beranda', compact('kelass'));
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
