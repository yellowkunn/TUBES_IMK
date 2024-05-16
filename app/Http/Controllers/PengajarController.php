<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PengajarController extends Controller
{
    public function dashboardpengajar()
    {
        return view('pengajar.dashboard');
    }
    public function absensipengajar()
    {
        return view('pengajar.absensi_pengajar');
    }
    public function detailkelaspengajar()
    {
        return view('pengajar.detail_kelas');
    }
    public function jadwalpengajar()
    {
        return view('pengajar.jadwal');
    }
}
