<?php

namespace App\Http\Controllers;

use App\Models\BaruDiakses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Kelas;
use Illuminate\Support\Facades\Auth;
use App\Models\Siswa;
use App\Models\Pengajar;
use App\Models\Pertemuan;
use Carbon\Carbon;
use App\Models\Notification;

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

        if (Auth::check()) {
            $user = Auth::user();
            $role = $user->role;
            $siswas = Siswa::where('pengguna_id', $user->id_pengguna)->with('kelas')->get();
            $siswaStatus = $siswas->pluck('status');
            switch ($role) {


                case 'user':
                    $notif = Notification::where('pengguna_id', $user->id_pengguna)->take(4)->get();
                    return view('beranda', compact('kelass', 'siswaStatus', 'notif'));
                case 'admin':
                    $siswas = Siswa::select('kelas_id')->distinct()->get();
                    $kelas_ids = $siswas->pluck('kelas_id')->toArray(); // Ambil semua kelas_id yang unik dan ubah ke dalam array

                    $kelasss = Kelas::leftJoin('siswa', 'kelas.id_kelas', '=', 'siswa.kelas_id')
                        ->select('kelas.*', DB::raw('COUNT(siswa.id_siswa) as total_siswa'))
                        ->whereNotNull('siswa.kelas_id')
                        ->with('siswa')
                        ->whereIn('kelas.id_kelas', $kelas_ids) // Tambahkan kondisi whereIn untuk membatasi hasil query
                        ->groupBy('kelas.id_kelas', 'kelas.nama', 'kelas.tingkat_kelas', 'kelas.foto', 'kelas.deskripsi', 'kelas.harga', 'kelas.fasilitas', 'kelas.rentang', 'kelas.jadwal_hari', 'kelas.jam', 'kelas.durasi', 'kelas.dibuat')
                        ->paginate(4);

                    $siswaa = Siswa::all();
                    $pengajarr = Pengajar::distinct()->pluck('id_pengajar');
                    $notif = Notification::join('users', 'notifications.pengguna_id', '=', 'users.id_pengguna')
                        ->where('users.role', 'admin')
                        ->select('notifications.*')  // Pilih kolom-kolom yang ingin diambil dari tabel notifications
                        ->take(4)
                        ->get();
                    return view('owner.dashboard', compact('kelasss', 'siswaStatus', 'kelass', 'siswaa', 'pengajarr', 'notif'));


                case 'pengajar':
                    $kelas_id = Pengajar::where('pengguna_id', $user->id_pengguna)->distinct()->pluck('kelas_id');
                    $kelasss = Kelas::leftJoin('siswa', 'kelas.id_kelas', '=', 'siswa.kelas_id')
                        ->select('kelas.*', DB::raw('COUNT(siswa.id_siswa) as total_siswa'))
                        ->withCount('siswa')
                        ->with('siswa') // Menyertakan data siswa secara lengkap
                        ->whereNotNull('siswa.kelas_id')
                        ->whereIn('kelas.id_kelas', $kelas_id)
                        ->groupBy('kelas.id_kelas', 'kelas.nama', 'kelas.tingkat_kelas', 'kelas.foto', 'kelas.deskripsi', 'kelas.harga', 'kelas.fasilitas', 'kelas.rentang', 'kelas.jadwal_hari', 'kelas.jam', 'kelas.durasi', 'kelas.dibuat')
                        ->get();

                    // Mapping nama hari dalam bahasa Indonesia ke angka
                    $hariMapping = [
                        'senin' => Carbon::MONDAY,
                        'selasa' => Carbon::TUESDAY,
                        'rabu' => Carbon::WEDNESDAY,
                        'kamis' => Carbon::THURSDAY,
                        'jumat' => Carbon::FRIDAY,
                        'sabtu' => Carbon::SATURDAY,
                        'minggu' => Carbon::SUNDAY,
                    ];

                    // Ambil pengajar berdasarkan user
                    $pengajars = Pengajar::where('pengguna_id', $user->id_pengguna)->get();
                    $kelas = [];

                    if ($pengajars->isNotEmpty()) {
                        $kelas_ids = [];

                        foreach ($pengajars as $pengajar) {
                            $kelas_ids[] = $pengajar->kelas_id;
                        }

                        // Ambil semua kelas dengan id_kelas yang ada
                        $kelas = Kelas::whereIn('id_kelas', $kelas_ids)->get();

                        $today = Carbon::today()->dayOfWeek; // Hari ini dalam format angka (0=Senin, 6=Minggu)

                        // Filter kelas berdasarkan jadwal_hari yang sudah lewat dari hari ini
                        $kelasYangLewat = [];

                        foreach ($kelas as $kelasItem) {
                            $jadwalHari = explode(',', $kelasItem->jadwal_hari);
                            $jadwalHariNumbers = [];

                            // Mengonversi nama hari ke angka
                            foreach ($jadwalHari as $hari) {
                                $hari = strtolower(trim($hari)); // Pastikan nama hari dalam format kecil dan strip spasi
                                if (isset($hariMapping[$hari])) {
                                    $jadwalHariNumbers[] = $hariMapping[$hari];
                                }
                            }

                            // Cek jika ada hari dalam jadwal_hari yang sudah lewat dari hari ini
                            foreach ($jadwalHariNumbers as $dayOfWeek) {
                                if ($dayOfWeek >= $today) {
                                    $kelasYangLewat[] = $kelasItem;
                                    break; // Keluar dari loop jika sudah menemukan hari yang sesuai
                                }
                            }
                        }

                        // Jika ada kelas yang sudah lewat, urutkan berdasarkan jarak hari dengan hari ini
                        if (!empty($kelasYangLewat)) {
                            usort($kelasYangLewat, function ($a, $b) use ($today, $hariMapping) {
                                $hariA = explode(',', $a->jadwal_hari);
                                $hariB = explode(',', $b->jadwal_hari);
                                $hariAClosest = null;
                                $hariBClosest = null;

                                foreach ($hariA as $hari) {
                                    $hariNum = $hariMapping[strtolower(trim($hari))];
                                    if ($hariNum >= $today) {
                                        $hariAClosest = $hariNum;
                                        break;
                                    }
                                }

                                foreach ($hariB as $hari) {
                                    $hariNum = $hariMapping[strtolower(trim($hari))];
                                    if ($hariNum >= $today) {
                                        $hariBClosest = $hariNum;
                                        break;
                                    }
                                }

                                // Hitung jarak hari dengan hari ini, ambil yang paling dekat
                                $diffA = $hariAClosest !== null ? abs($hariAClosest - $today) : PHP_INT_MAX;
                                $diffB = $hariBClosest !== null ? abs($hariBClosest - $today) : PHP_INT_MAX;

                                return $diffA <=> $diffB;
                            });

                            // Ambil satu record yang paling dekat
                            $kelasYangTerdekat = $kelasYangLewat[0];
                        } else {
                            $kelasYangTerdekat = null;
                        }
                    }

                    $barudiakses = BaruDiakses::where('pengguna_id', $user->id_pengguna)
                        ->orderBy('baru_diakses', 'desc')
                        ->first();
                    return view('pengajar.dashboard', compact('kelasss', 'siswaStatus', 'barudiakses', 'kelasYangTerdekat'));


                case 'siswa':

                    // Ambil kelasId dari BaruDiakses yang paling baru
                    $barudiakses = BaruDiakses::where('pengguna_id', $user->id_pengguna)
                        ->orderBy('baru_diakses', 'desc')
                        ->first();

                    if ($barudiakses && $barudiakses->pertemuan) {
                        $kelasId = $barudiakses->pertemuan->kelas_id;
                        $pertemuanId = $barudiakses->pertemuan_id;
                    } else {
                        $kelasId = null;
                        $pertemuanId = null;
                    }

                    // Pastikan $pertemuanId tidak null sebelum melakukan kueri
                    if ($kelasId && $pertemuanId) {
                        $pertemuans = Pertemuan::with('materi', 'tugas', 'link')
                            ->where('kelas_id', $kelasId)
                            ->where('id_pertemuan', $pertemuanId)
                            ->get()
                            ->groupBy('pertemuan_ke');
                    } else {
                        $pertemuans = collect(); // Atau nilai default lain, seperti koleksi kosong
                    }


                    // Debug untuk melihat hasilnya


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


                    $siswa = Siswa::where('pengguna_id', $user->id_pengguna)->first();
                    if ($siswa) {
                        $status = $siswa->status;
                        if ($status == 'MenungguVerif') {
                            return view('beranda', compact('kelass', 'siswaStatus'));
                        } elseif ($status == 'Aktif' || $status == 'TidakAktif') {










                            // Mapping nama hari dalam bahasa Indonesia ke angka
                    $hariMapping = [
                        'senin' => Carbon::MONDAY,
                        'selasa' => Carbon::TUESDAY,
                        'rabu' => Carbon::WEDNESDAY,
                        'kamis' => Carbon::THURSDAY,
                        'jumat' => Carbon::FRIDAY,
                        'sabtu' => Carbon::SATURDAY,
                        'minggu' => Carbon::SUNDAY,
                    ];

                    // Ambil pengajar berdasarkan user
                    $sw = Siswa::where('pengguna_id', $user->id_pengguna)->get();
                    $kelas = [];

                    if ($sw->isNotEmpty()) {
                        $kelas_ids = [];

                        foreach ($sw as $siswa) {
                            $kelas_ids[] = $siswa->kelas_id;
                        }

                        // Ambil semua kelas dengan id_kelas yang ada
                        $kelas = Kelas::whereIn('id_kelas', $kelas_ids)->get();

                        $today = Carbon::today()->dayOfWeek; // Hari ini dalam format angka (0=Senin, 6=Minggu)

                        // Filter kelas berdasarkan jadwal_hari yang sudah lewat dari hari ini
                        $kelasYangLewat = [];

                        foreach ($kelas as $kelasItem) {
                            $jadwalHari = explode(',', $kelasItem->jadwal_hari);
                            $jadwalHariNumbers = [];

                            // Mengonversi nama hari ke angka
                            foreach ($jadwalHari as $hari) {
                                $hari = strtolower(trim($hari)); // Pastikan nama hari dalam format kecil dan strip spasi
                                if (isset($hariMapping[$hari])) {
                                    $jadwalHariNumbers[] = $hariMapping[$hari];
                                }
                            }

                            // Cek jika ada hari dalam jadwal_hari yang sudah lewat dari hari ini
                            foreach ($jadwalHariNumbers as $dayOfWeek) {
                                if ($dayOfWeek >= $today) {
                                    $kelasYangLewat[] = $kelasItem;
                                    break; // Keluar dari loop jika sudah menemukan hari yang sesuai
                                }
                            }
                        }

                        // Jika ada kelas yang sudah lewat, urutkan berdasarkan jarak hari dengan hari ini
                        if (!empty($kelasYangLewat)) {
                            usort($kelasYangLewat, function ($a, $b) use ($today, $hariMapping) {
                                $hariA = explode(',', $a->jadwal_hari);
                                $hariB = explode(',', $b->jadwal_hari);
                                $hariAClosest = null;
                                $hariBClosest = null;

                                foreach ($hariA as $hari) {
                                    $hariNum = $hariMapping[strtolower(trim($hari))];
                                    if ($hariNum >= $today) {
                                        $hariAClosest = $hariNum;
                                        break;
                                    }
                                }

                                foreach ($hariB as $hari) {
                                    $hariNum = $hariMapping[strtolower(trim($hari))];
                                    if ($hariNum >= $today) {
                                        $hariBClosest = $hariNum;
                                        break;
                                    }
                                }

                                // Hitung jarak hari dengan hari ini, ambil yang paling dekat
                                $diffA = $hariAClosest !== null ? abs($hariAClosest - $today) : PHP_INT_MAX;
                                $diffB = $hariBClosest !== null ? abs($hariBClosest - $today) : PHP_INT_MAX;

                                return $diffA <=> $diffB;
                            });

                            // Ambil satu record yang paling dekat
                            $kelasYangTerdekat = $kelasYangLewat[0];
                        } else {
                            $kelasYangTerdekat = null;
                        }
                    }
                            return view('siswa.dashboard', compact('siswa', 'siswas', 'barudiakses', 'groupedPertemuans', 'kelasYangTerdekat'));
                        }
                    }


                    return redirect()->back();
                default:
                    return redirect()->back();
            }
        } else {
            return view('beranda', compact('kelass'));
        }
    }
}
