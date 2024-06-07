<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\Pengajar;

class AdminController extends Controller
{
    // public function dashboardadmin()
    // {
    //     $siswas = Siswa::select('kelas_id')->distinct()->get();
    //     $kelas_ids = $siswas->pluck('kelas_id')->toArray(); // Ambil semua kelas_id yang unik dan ubah ke dalam array
        
    //     $kelasss = Kelas::leftJoin('siswa', 'kelas.id_kelas', '=', 'siswa.kelas_id')
    //         ->select('kelas.*', DB::raw('COUNT(siswa.id_siswa) as total_siswa'))
    //         ->whereNotNull('siswa.kelas_id')
    //         ->whereIn('kelas.id_kelas', $kelas_ids) // Tambahkan kondisi whereIn untuk membatasi hasil query
    //         ->groupBy('kelas.id_kelas', 'kelas.nama', 'kelas.tingkat_kelas', 'kelas.foto', 'kelas.deskripsi', 'kelas.harga', 'kelas.fasilitas', 'kelas.rentang', 'kelas.jadwal_hari', 'kelas.durasi', 'kelas.dibuat')
    //         ->get();

    //     $totalkelas = Kelas::all();
    //     return view('owner.dashboard', compact('kelasss', 'totalkelas'));
    // }

    public function pengaturanruangan()
    {
        $kelass = Kelas::all();
        return view ('owner.pengaturan_ruangan', compact('kelass'));
    }

    public function editdaftarkelas()
    {
        $kelass = Kelas::all();
        return view ('owner.daftar_kelas', compact('kelass'));
    }

    public function editdetailkelas(Kelas $kelas)
    {
        return view('owner.detail_kelas', [
            "kelas" => $kelas
        ]);
    }
    public function editdaftarsiswa()
    {
        $siswas = Siswa::all();
        return view ('owner.daftar_siswa', compact('siswas'));
    }
    public function editdaftarpengajar()
    {
        $pengajars = Pengajar::all();
        return view ('owner.daftar_pengajar', compact('pengajars'));
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
        DB::select('call kelas_baru(?,?,?,?,?,?,?,?,?)',
        array($request->get('nama'),$request->get('tingkat_kelas'),
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

    // public function destroy(Request $request): RedirectResponse
    // {
    //     Auth::guard('web')->logout();

    //     $request->session()->invalidate();

    //     $request->session()->regenerateToken();

    //     return redirect('/');
    // }
}
