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
use App\Models\Notification;
use Illuminate\Support\Facades\Auth;

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

    public function verifikasipendaftar()
    {
        $siswam = Siswa::where('status', 'MenungguVerif')->get();
        return view('owner.verifikasi_pendaftar', compact('siswam'));
    }

    public function pembayaran()
    {
        return view('owner.pembayaran');
    }

    public function pengaturanruangan()
    {
        $kelasJamkos = Kelas::whereNull('jam')->get();
        $kelass = Kelas::whereNotNull('jam')->get();
        $pengajars = User::where('role', 'pengajar')->get();
        return view('owner.pengaturan_ruangan', compact('kelasJamkos', 'kelass', 'pengajars'));
    }

    public function kalenderpendidikan()
    {
        return view('owner.kalender_pendidikan');
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
        $siswas = Siswa::whereIn('status', ['Aktif', 'TidakAktif'])->get();
        return view('owner.daftar_siswa', compact('siswas'));
    }
    public function editdaftarpengajar()
    {
        $pengajars = Pengajar::all();
        $kelas = Kelas::all();
        $pengguna = User::whereIn('role', ['user', 'pengajar'])->get();
        return view('owner.daftar_pengajar', compact('pengajars', 'pengguna', 'kelas'));
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

    public function aturRuangan(Request $request)
    {
        $request->validate([
            'id_kelas' => 'required|exists:kelas,id_kelas',
            'jam' => 'required|string|max:255',
            'pengajar' => 'required|exists:users,id_pengguna'
        ]);

        Kelas::where('id_kelas', $request->id_kelas)->update([
            'jam' => $request->jam
        ]);

        $exists = Pengajar::where('pengguna_id', $request->pengajar)
            ->where('kelas_id', $request->id_kelas)
            ->exists();

        if (!$exists) {
            Pengajar::insert([
                'pengguna_id' => $request->pengajar,
                'kelas_id' => $request->id_kelas,
                'jabatan' => 'pengajar'
            ]);
            return redirect()->back()->with('success', 'Jadwal berhasil diperbarui dan pengajar ditambahkan.');
        } else {
            return redirect()->back()->with('pesanPengajar', 'Pengajar sudah terdaftar di kelas ini.')->with('success', 'Jadwal berhasil diperbarui.');
        }
    }

    public function editPengaturanRuangKelas(Request $request)
    {
        $request->validate([
            'id_kelas' => 'required|exists:kelas,id_kelas',
            'pengajar' => 'required|exists:users,id_pengguna',
            'jam' => 'nullable|string',
            'hari' => 'required|array',
        ]);

        // Perbarui data pengajar
        Pengajar::where('kelas_id', $request->id_kelas)->update([
            'pengguna_id' => $request->pengajar
        ]);

        // Ambil data yang ada dari database
        $kelas = Kelas::where('id_kelas', $request->id_kelas)->first();

        // Pecah data jadwal_hari yang sudah ada menjadi array
        $existingHari = explode(',', $kelas->jadwal_hari);

        // Gabungkan data baru dengan data yang sudah ada
        $combinedHari = array_merge($existingHari, $request->hari);

        // Proses jam
        $jam = $kelas->jam;
        $newJam = $request->jam;

        // Menggabungkan jam yang sudah ada dengan yang baru, dan memastikan unik
        $combinedJam = array_unique(array_merge(explode(',', $jam), explode(',', $newJam)));

        // Hilangkan duplikasi dari hasil penggabungan
        $uniqueHari = array_unique($combinedHari);
        sort($uniqueHari);

        // Hilangkan duplikasi dari hasil penggabungan
        $uniqueHari = array_unique($combinedHari);

        // Update data ke database
        Kelas::where('id_kelas', $request->id_kelas)->update([
            'jadwal_hari' => implode(',', $uniqueHari),
            'jam' => implode(',', $combinedJam)
        ]);

        return redirect()->back()->with('success', 'Ruangan berhasil diperbarui');
    }


    public function uploadSertifikat(Request $request)
    {
        $request->validate([
            'sertifikatPengajar' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:10240', // 10 MB dalam kilobyte
            'sertifikatSiswa' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:10240', // 10 MB dalam kilobyte
            'nama' => 'required|string|max:255',
            'keterangan' => 'required|string|max:255',
            'pengajar_id' => 'nullable|exists:users,id_pengguna|required_without:siswa_id',
            'siswa_id' => 'nullable|exists:users,id_pengguna|required_without:pengajar_id',
        ]);

        if ($request->hasFile('sertifikatPengajar')) {
            $file = $request->file('sertifikatPengajar');
            $pengguna_id = $request->pengajar_id;
        } elseif ($request->hasFile('sertifikatSiswa')) {
            $file = $request->file('sertifikatSiswa');
            $pengguna_id = $request->siswa_id;
        } else {
            return redirect()->back()->withErrors('Sertifikat harus diunggah.');
        }

        $nama_file = 'file_' . now()->format('YmdHis') . '_' . Str::random(10) . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('sertifikat'), $nama_file);

        // Insert data ke tabel Sertifikat
        Sertifikat::insert([
            'pengguna_id' => $pengguna_id,
            'nama' => $request->nama,
            'keterangan' => $request->keterangan,
            'sertifikat' => $nama_file,
        ]);

        return redirect()->back()->with('success', 'Sertifikat berhasil ditambahkan');
    }



    public function hapusPengajar($id)
    {
        $pengguna = Pengajar::find($id);

        if ($pengguna) {
            $pengguna->delete();
            return redirect()->back()->with('success', 'Pengajar berhasil dihapus');
        } else {
            return redirect() - back()->with('error', 'Pengajar tidak ditemukan');
        }
    }

    public function deleteKelas($id)
    {
        $kelas = Kelas::find($id);

        if ($kelas) {
            $kelas->delete();
            return redirect()->back()->with('success', 'Kelas berhasil dihapus');
        } else {
            return redirect() - back()->with('error', 'Kelas tidak ditemukan');
        }
    }

    public function hapusSiswa(Request $request, $id)
    {
        $pengguna = Siswa::find($id);
        if (!$pengguna) {
            return redirect()->back()->with('error', 'Siswa tidak ditemukan');
        }

        // Hapus siswa
        $pengguna->delete();

        // Periksa apakah pengguna terkait masih ada
        $pengguna_id = $pengguna->pengguna_id;
        $cekpengguna = Siswa::where('pengguna_id', $pengguna_id)->exists();

        Notification::create([
            'pengguna_id' => $pengguna_id,
            'keterangan' => $request->keterangan
        ]);

        if (!$cekpengguna) {
            User::where('id_pengguna', $pengguna_id)->update(['role' => 'user']);
        }

        return redirect()->back()->with('success', 'Siswa berhasil dihapus');
    }
    public function tolakSiswa(Request $request, $id)
    {
        $pengguna = Siswa::find($id);
        if (!$pengguna) {
            return redirect()->back()->with('error', 'Siswa tidak ditemukan');
        }

        $pengguna->delete();
        Siswa::where('pengguna_id', $pengguna->pengguna_id)->update(['status' => 'Ditolak']);

        $pengguna_id = $pengguna->pengguna_id;
        $cekpengguna = Siswa::where('pengguna_id', $pengguna_id)->exists();

        Notification::create([
            'pengguna_id' => $pengguna_id,
            'keterangan' => $request->keterangan
        ]);

        if (!$cekpengguna) {
            User::where('id_pengguna', $pengguna_id)->update(['role' => 'user']);
        }

        $p = Auth::user();
        Notification::where('pengguna_id', $p)
            ->orderBy('dibuat', 'desc')
            ->first()
            ->delete();

        return redirect()->back()->with('success', 'Siswa berhasil ditolak');
    }

    public function terimaSiswa(Request $request, $id)
    {
        $siswa = Siswa::find($id);
        if (!$siswa) {
            return redirect()->back()->with('error', 'Siswa tidak ditemukan');
        }

        // Update status siswa menjadi 'Aktif'
        $siswa->update(['status' => 'Aktif']);

        // Ambil pengguna_id dari siswa
        $pengguna_id = $siswa->pengguna_id;

        // Buat notifikasi
        Notification::create([
            'pengguna_id' => $pengguna_id,
            'keterangan' => $request->keterangan
        ]);

        // Ambil pengguna yang sedang login
        $p = Auth::user();

        // Ambil notifikasi pertama berdasarkan field 'dibuat'
        $firstNotification = Notification::where('pengguna_id', $p->id_pengguna)
            ->orderBy('dibuat', 'asc')
            ->first();

        // Hapus notifikasi pertama jika ada
        if ($firstNotification) {
            $firstNotification->delete();
        }

        // Ambil notifikasi pertama berdasarkan field 'dibuat'
        $awuNotification = Notification::where('pengguna_id', $pengguna_id)
            ->orderBy('dibuat', 'asc')
            ->first();

        // Hapus notifikasi pertama jika ada
        if ($awuNotification) {
            $awuNotification->delete();
        }

        return redirect()->back()->with('success', 'Siswa berhasil diterima');
    }


    public function tambahkelasbaru(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255|unique:kelas',
            'tingkat_kelas' => 'required|string|max:100',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'deskripsi' => 'nullable|string|max:1000',
            'harga' => 'required|numeric',
            'fasilitas' => 'nullable|string|max:1000',
            'rentang' => 'nullable|string|max:100',
            'hari' => 'required|array',
            'jam' => 'nullable|date_format:H:i',
            'durasi' => 'nullable|string|max:100',
        ]);

        // Menyimpan file gambar
        $file = $request->file('gambar');
        $extension = $file->getClientOriginalExtension();
        $nama_file = 'file_' . date('YmdHis') . '.' . $extension;
        $file->move(public_path('berkas_ujis'), $nama_file);
        $berkas = '' . $nama_file;

        // Menyimpan data ke database
        Kelas::create([
            'nama' => $validatedData['nama'],
            'tingkat_kelas' => $validatedData['tingkat_kelas'],
            'foto' => $berkas,
            'deskripsi' => $validatedData['deskripsi'],
            'harga' => $validatedData['harga'],
            'fasilitas' => $validatedData['fasilitas'],
            'rentang' => $validatedData['rentang'],
            'jadwal_hari' => implode(',', $request->hari),
            'durasi' => $validatedData['durasi'],
        ]);

        // Redirect ke halaman lain setelah berhasil disimpan
        return redirect()->back()->with('success', 'Kelas berhasil ditambahkan!');
    }
}
