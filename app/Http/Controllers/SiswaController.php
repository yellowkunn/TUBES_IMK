<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Kelas;
use Illuminate\Support\Facades\Auth;
use App\Models\Biodata_siswa;
use App\Models\Notification;
use App\Models\Siswa;
use App\Models\Pertemuan;
use App\Models\Sertifikat;

class SiswaController extends Controller
{
    public function formulirpendaftaran()
    {
        $user = Auth::user();
        $form = Biodata_siswa::where('pengguna_id', $user->id_pengguna)->first();
        $kelass = Kelas::all();
        return view('user.formulir_pendaftaran', compact('kelass'));
    }

    public function kirimformulirpendaftaran(Request $request)
    {
        $request->validate([
            'kelas' => 'required|exists:kelas,id_kelas',
            'jam' => 'required|string',
            'gambar' => 'nullable|image|max:2048',
            'namalengkap' => 'required|string|max:255',
            'gender' => 'required|in:Laki-laki,Perempuan',
            'tempatlahir' => 'required|string|max:255',
            'tanggallahir' => 'required|date',
            'agama' => 'required|string|max:255',
            'kewarganegaraan' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'notelp' => 'required|string|max:255',
            'nohp' => 'required|string|max:255',
            'pendidikanterakhir' => 'required|string|max:255',
            'diterimakursus' => 'required|string|max:255',
            'tingkat_kelas' => 'required|string|max:255',
            'namaortu' => 'required|string|max:255',
            'tempatlahirortu' => 'required|string|max:255',
            'tanggallahirortu' => 'required|date',
            'agamaortu' => 'required|string|max:255',
            'pendidikanortu' => 'required|string|max:255',
            'pekerjaanortu' => 'required|string|max:255',
        ]);

        $file = $request->file('gambar');
        $extension = $file->getClientOriginalExtension();
        $nama_file = 'file_' . date('YmdHis') . '.' . $extension;
        $file->move(public_path('berkas_ujis'), $nama_file);
        $berkas = '' . $nama_file;

        // Create the Siswa record
        Siswa::create([
            'pengguna_id' => Auth::user()->id_pengguna,
            'kelas_id' => $request->kelas,
            'jam_kelas' => $request->jam,
            'status' => 'MenungguVerif'
        ]);

        // Create the BiodataSiswa record
        Biodata_siswa::create([
            'pengguna_id' => Auth::user()->id_pengguna,
            'foto' => $berkas,
            'nama_lengkap' => $request->namalengkap,
            'jenis_kelamin' => $request->gender,
            'tempat_lahir' => $request->tempatlahir,
            'tgl_lahir' => $request->tanggallahir,
            'agama' => $request->agama,
            'kewarganegaraan' => $request->kewarganegaraan,
            'alamat' => $request->alamat,
            'no_telepon' => $request->notelp,
            'no_hp' => $request->nohp,
            'pendidikan' => $request->pendidikanterakhir,
            'diterimakursus' => $request->diterimakursus,
            'tingkat_kelas' => $request->tingkat_kelas,
            'nama_ortu' => $request->namaortu,
            'tempat_lahir_ortu' => $request->tempatlahirortu,
            'tgl_lahir_ortu' => $request->tanggallahirortu,
            'agama_ortu' => $request->agamaortu,
            'pendidikan_ortu' => $request->pendidikanortu,
            'pekerjaan_ortu' => $request->pekerjaanortu,
        ]);
            return redirect('/berandasiswa')->with('success_fp', 'Formulir pendaftaran berhasil dikirim dan akan ditinjau dalam 2x24 jam oleh pihak FEC. 
                                            Harap periksa progres pendaftaran anda secara berkala pada laman Progres Pendaftaran');
    }

    public function detailkelas(Kelas $kelas)
    {
        $class = Kelas::whereNotIn('id_kelas', $kelas)->get();
        return view('detail_tawaran_kelas', ["kelas" => $kelas], compact('class'));
    }

    public function programkelas(Kelas $kelas)
    {
        // Ambil data pertemuan beserta relasinya
        $pertemuans = Pertemuan::with('materi', 'tugas', 'link')
            ->where('kelas_id', $kelas->id_kelas)
            ->get()
            ->groupBy('pertemuan_ke'); // Kelompokkan berdasarkan pertemuan_ke

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
        // dd($groupedPertemuans);

        return view('siswa.detail_kelas', compact('kelas', 'groupedPertemuans'));
    }


    public function dashboardsiswa()
    {
        $user = Auth::user();
        $siswas = Siswa::where('pengguna_id', $user->id_pengguna)->with('kelas')->get();
        return view('siswa.dashboard', compact('siswas'));
    }
    public function berandasiswa()
    {

        try {
            $kelass = Kelas::all();
        } catch (\Exception $e) {
            // Tangani kesalahan koneksi ke database di sini
            return redirect()->back()->with('error', 'Tidak dapat terhubung ke database.');
        }
        $user = Auth::user();
        $notif = Notification::where('pengguna_id', $user->id_pengguna)->take(4)->get();
        return view('beranda', compact('kelass', 'notif'));
    }

    public function kelassaya()
    {
        $user = Auth::user();
        $siswas = Siswa::where('pengguna_id', $user->id_pengguna)->with('kelas')->get();
        return view('siswa.kelas_saya', compact('siswas'));
    }

    public function editprofile()
    {
        $user = Auth::user();
        $siswas = Biodata_siswa::where('pengguna_id', $user->id_pengguna)->first();
        return view('siswa.profile', compact('siswas'));
    }

    public function pembayaran()
    {
        $user = Auth::user();
        $siswas = Siswa::where('pengguna_id', $user->id_pengguna)->with('kelas')->get();
        return view('siswa.pembayaran', compact('siswas'));
    }

    public function rapor()
    {
        $user = Auth::user();
        $siswas = Siswa::where('pengguna_id', $user->id_pengguna)->with('kelas')->get();
        return view('siswa.detail_rapor', compact('siswas'));
    }
    public function sertifikat()
    {
        $user = Auth::user();
        $sertifikats = Sertifikat::where('pengguna_id', $user->id_pengguna)->get();
        return view('siswa.sertifikat', compact('sertifikats'));
    }
}
