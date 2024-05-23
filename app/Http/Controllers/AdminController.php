<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Kelas;

class AdminController extends Controller
{
    public function dashboardadmin()
    {
        return view('owner.dashboard');
    }

    public function editdaftarkelas()
    {
        $kelass = Kelas::all();
        return view ('owner.daftar_kelas', compact('kelass'));
    }
    public function editdaftarsiswa()
    {
        return view ('owner.daftar_siswa');
    }
    public function editdaftarpengajar()
    {
        return view ('owner.daftar_pengajar');
    }

    public function tambahkelasbaru(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255|unique:kelas',
            'deskripsi' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'rentang' => 'required|string|max:255',
            'fasilitas' => 'required|string|max:255',
            'gambar' => 'required|mimes:doc,docx,xls,xlsx,pdf,jpg,jpeg,png,bmp',
            // 'jadwal_hari' => 'in:Senin,Selasa,Rabu,Kamis,Jumat,Sabtu,Minggu',
            'durasi' => 'required|string|max:255'
        ]);
        
        $file = $request->file('gambar');
        if ($file) {
            // $judul = $request->get('gambar');
            $extension = $file->getClientOriginalExtension();
            $nama_file = 'file_' . date('YmdHis') . '.' . $extension;
            $file->move(public_path('berkas_ujis'), $nama_file);
            $berkas = '' . $nama_file;
        }
        DB::select('call kelas_baru(?,?,?,?,?,?,?,?)',
        array($request->get('nama'),
        $berkas,
        $request->get('deskripsi'),
        $request->get('harga'),
        $request->get('fasilitas'),
        $request->get('rentang'),
        $request->get('jadwal_hari'),
        $request->get('durasi')
    ));
        return redirect()->back()->with('success', 'Kelas berhasil ditambahkan');
    }
}
