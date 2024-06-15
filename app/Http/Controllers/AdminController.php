<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\Pengajar;
use App\Models\User;
use App\Models\Biodata_Pengajar;
use App\Models\Sertifikat;
use Illuminate\Support\Str;

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

    public function kalenderpendidikan()
    {
        return view ('owner.kalender_pendidikan');
    }

    public function editdaftarkelas()
    {
        $kelass = Kelas::all();
        $pengajars = DB::table('view_pengajar_unique')->get(); // Mengambil data dari view_pengajar_unique
        return view('owner.daftar_kelas', compact('kelass', 'pengajars')); // Menyertakan $pengajar ke dalam compact
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
        $kelas = Kelas::all();
        $pengguna = User::where('role', 'user')->get();
        return view ('owner.daftar_pengajar', compact('pengajars', 'pengguna', 'kelas'));
    }

    public function tambahpengajarbaru(Request $request)
    {
        // Validasi input
        $request->validate([
            'pengajar' => 'required|exists:users,id_pengguna',
            'nama' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'tempat' => 'required|string|max:255',
            'agama' => 'required|string|max:50',
            'jabatan' => 'nullable|string|max:255',
            'kelas' => 'nullable|exists:kelas,id_kelas',
            'pendidikan' => 'required|string|max:255',
            'noHp' => 'required|string|max:15',
            'noTelp' => 'required|string|max:15',
            'kewarganegaraan' => 'required|string|max:50',
        ]);

        // Insert data ke tabel biodata_pengajar menggunakan create
        Biodata_Pengajar::insert([
            'pengguna_id' => $request->pengajar,
            'nama_lengkap' => $request->nama,
            'tmpt_tgl_lahir' => $request->tanggal_lahir,
            'alamat' => $request->tempat,
            'agama' => $request->agama,
            'kewarganegaraan' => $request->kewarganegaraan,
            'no_hp' => $request->noHp,
            'no_telepon' => $request->noTelp,
            'pendidikan' => $request->pendidikan,
        ]);

        // Insert data ke tabel pengajar menggunakan create
        Pengajar::insert([
            'pengguna_id' => $request->pengajar,
            'kelas_id' => $request->kelas,
            'jabatan' => $request->jabatan,
        ]);

        User::where('id_pengguna', $request->pengajar)->update([
            'role' => 'pengajar',
        ]);

        return redirect()->back()->with('success', 'Pengajar berhasil ditambahkan');
    }

    public function uploadSertifikat(Request $request)
    {
        $request->validate([
            'sertifikatPengajar' => 'required|file|mimes:pdf|max:10240', // 10 MB dalam kilobyte
            'keterangan' => 'required|string|max:255',
            'pengajar_id' => 'required|exists:users,id_pengguna',]);

        $file = $request->file('sertifikatPengajar');
        $nama_file = 'file_' . now()->format('YmdHis') . '_' . Str::random(10) . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('sertifikat'), $nama_file);

        Sertifikat::insert([    
            'pengguna_id' => $request->pengajar_id,
            'keterangan' => $request->keterangan,
            'sertifikat' => $nama_file,
        ]);

        return redirect()->back()->with('success', 'Sertifikat berhasil ditambahkan');

    }

    public function hapusPengajar($id)
    {
        $pengguna = User::find($id);

        if ($pengguna) {
            $pengguna->delete();
            return redirect()->back()->with('success', 'Penngajar berhasil dihapus');
        } else {
            return redirect()-back()->with('error', 'Pengajar tidak ditemukan');
        }
    }


    public function tambahkelasbaru(Request $request)
    {
        $request->validate([
            'tingkat_kelas' => 'required|string|max:255',
            'harga' => 'required|numeric|min:0',
            'rentang' => 'required|string|max:255',
            'fasilitas' => 'required|string|max:1000', // Sesuaikan ukuran maksimal sesuai kebutuhan
            'gambar' => 'nullable|file|mimes:jpg,jpeg,png,bmp|max:2048', // Maksimal 2 MB
            // 'jadwal_hari' => 'required|in:Senin,Selasa,Rabu,Kamis,Jumat,Sabtu,Minggu',
            'durasi' => 'required|string|max:255'
        ]);

        try{
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
            return redirect()->back()->with('success', 'Berhasil menambahkan kelas');
        } catch (Exception $e){
            return redirect()->back()->with('error', 'Gagal menambahkan kelas');

        }
    }

    public function hapuskelas(Request $request, $id){
        $kelas = Kelas::findOrFail($id);
        
        $kelas->delete();

        return redirect()->back()->with('success', 'Kelas berhasil dihapus');
    }

    // public function destroy(Request $request): RedirectResponse
    // {
    //     Auth::guard('web')->logout();

    //     $request->session()->invalidate();

    //     $request->session()->regenerateToken();

    //     return redirect('/');
    // }
}
