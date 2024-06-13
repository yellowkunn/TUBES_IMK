<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Siswa;
use App\Models\Kelas;
use App\Models\BaruDiakses;
use Illuminate\Support\Facades\Auth;

class Kelass extends Component
{
    public $filterkelas = 'Aktif';
    public $kelas;

    public function baru_diakses($kelas_id)
    {
        $kelas = Kelas::find($kelas_id);

        if (!$kelas) {
            // Jika kelas tidak ditemukan, bisa Anda tambahkan logika untuk menangani hal ini
            return;
        }

        $pengguna_id = Auth::user()->id_pengguna;

        // Cek apakah sudah ada data dengan kelas_id yang sama
        $baruDiakses = BaruDiakses::where('kelas_id', $kelas_id)->first();

        if ($baruDiakses) {
            // Jika ada, update data
            $baruDiakses->update([
                'pengguna_id' => $pengguna_id,
                'kelas_id' => $kelas_id,
                'baru_diakses' => now()->toTimeString(), // Waktu saat fungsi dijalankan
            ]);
        } else {
            // Jika tidak ada, buat data baru
            BaruDiakses::insert([
                'pengguna_id' => $pengguna_id,
                'kelas_id' => $kelas_id,
                'baru_diakses' => now()->toTimeString(),
            ]);
        }
    }

    public function filter_kelas()
    {
    }
    public function render()
    {
        $user = Auth::user();
        $siswa = Siswa::where('pengguna_id', $user->id_pengguna)->get();
        return view('livewire.kelass', [
            'siswa' => $siswa,
        ]);
    }
}
