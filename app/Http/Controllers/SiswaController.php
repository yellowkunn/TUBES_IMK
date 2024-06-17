<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Kelas;
use Illuminate\Support\Facades\Auth;
use App\Models\Biodata_siswa;
use App\Models\Siswa;
use App\Models\Pertemuan;

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
        dd($request->all);
        $request->validate([
            'gambar' => 'required|mimes:jpg,jpeg,png,bmp|max:2048', // File gambar
            'namalengkap' => 'required|string|max:255|regex:/^[a-zA-Z\s\.\']+$/',
            'gender' => 'required|in:Laki-laki,Perempuan', // Enum values
            'tempatlahir' => 'required|string|max:255|regex:/^[a-zA-Z\s\.\']+$/',
            'tanggallahir' => 'required|date_format:d-m-Y', // Format tanggal DD-MM-YYYY
            'agama' => 'required|string|max:255',
            'kewarganegaraan' => 'required|string|max:255',
            'alamat' => 'required|string', // Tidak ada batasan ukuran di MySQL untuk TEXT
            'notelp' => 'required|regex:/^\+?62?\d{9,12}$/',
            'nohp' => 'required|regex:/^\+?62?\d{9,12}$/',
            'pendidikanterakhir' => 'required|string|max:255',
            'diterimakursus' => 'required|string|max:255',
            'tingkat_kelas' => 'required|string|max:255',
            'namaortu' => 'required|string|max:255|regex:/^[a-zA-Z\s\.\']+$/',
            'tempatlahirortu' => 'required|string|max:255|regex:/^[a-zA-Z\s\.\']+$/',
            'tanggallahirortu' => 'required|date_format:d-m-Y',
            'agamaortu' => 'required|string|max:255',
            'pendidikanortu' => 'required|string|max:255',
            'pekerjaanortu' => 'required|string|max:255'
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
            DB::select(
                'call kirimformulirpendaftaran(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)',
                array(
                    $request->get('id_pengguna'), $berkas,
                    $request->get('namalengkap'), $request->get('gender'),
                    $request->get('tempatlahir'), $request->get('tanggallahir'),
                    $request->get('agama'), $request->get('kewarganegaraan'),
                    $request->get('alamat'), $request->get('notelp'),
                    $request->get('nohp'), $request->get('pendidikanterakhir'),
                    $request->get('diterimakursus'), $request->get('tingkat_kelas'), $request->get('namaortu'),
                    $request->get('tempatlahirortu'), $request->get('tanggallahirortu'),
                    $request->get('agamaortu'), $request->get('pendidikanortu'),
                    $request->get('pekerjaanortu')
                )
            );
            DB::select(
                'call insert_siswa(?,?,?)',
                array($request->get('id_pengguna'), $request->get('kelas'), $request->get('status'))
            );
            return redirect('/berandasiswa')->with('success_fp', 'Formulir pendaftaran berhasil dikirim dan akan ditinjau dalam 2x24 jam oleh pihak FEC. 
                                            Harap periksa progres pendaftaran anda secara berkala pada laman Progres Pendaftaran');
        } catch(Exception $e){
            return redirect('/berandasiswa')->with('error_fp','Gagal mengirim formulir pendaftaran Anda');
        }
    }

    public function detailkelas(Kelas $kelas)
    {
        $class = Kelas::whereNotIn('id_kelas', $kelas)->get();
        return view('detail_tawaran_kelas', ["kelas" => $kelas], compact('class'));
    }

    public function programkelas(Kelas $kelas)
    {
        // Ambil data pertemuan beserta relasinya
        $pertemuans = Pertemuan::with('materi', 'tugas')
            ->where('kelas_id', $kelas->id_kelas)
            ->get()
            ->groupBy('pertemuan_ke'); // Kelompokkan berdasarkan pertemuan_ke

        $groupedPertemuans = [];

        foreach ($pertemuans as $pertemuan_ke => $items) {
            // Gabungkan materi dan tugas
            $materi = collect();
            $tugas = collect();

            foreach ($items as $item) {
                $materi = $materi->merge($item->materi);
                $tugas = $tugas->merge($item->tugas);
            }

            // Tambahkan ke array hasil
            $groupedPertemuans[] = (object) [
                'pertemuan_ke' => $pertemuan_ke,
                'judul' => $items->first()->judul,
                'materi' => $materi,
                'tugas' => $tugas,
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

        return view('beranda', compact('kelass'));
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
        $siswas = Siswa::where('pengguna_id', $user->id_pengguna)->with('kelas')->get();
        return view('siswa.sertifikat', compact('siswas'));
    }
}
