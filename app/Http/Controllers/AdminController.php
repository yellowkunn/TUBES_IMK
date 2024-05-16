<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboardadmin()
    {
        return view('owner.dashboard');
    }

    public function editdaftarkelas()
    {
        return view ('owner.daftar_kelas');
    }
    public function editdaftarsiswa()
    {
        return view ('owner.daftar_siswa');
    }
    public function editdaftarpengajar()
    {
        return view ('owner.daftar_pengajar');
    }
}
