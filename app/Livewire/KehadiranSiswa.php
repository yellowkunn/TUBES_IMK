<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Siswa;
use App\Models\Kelas;
use App\Models\Absensi;
use App\Models\Pertemuan;
use Carbon\Carbon;


class KehadiranSiswa extends Component
{

    public $kelas;
    public $kehadiran_siswas = [];
    public $pengajar;
    public $pertemuan;
    public function mount(Pertemuan $pertemuan)
    {
        $this->pertemuan = $pertemuan;
    }

    public function kehadiranSiswas()
    {
        foreach ($this->kehadiran_siswas as $siswa_id => $kehadiran) {
            if ($kehadiran) {
                Absensi::insert([
                    'kelas_id' => $this->pertemuan->kelas_id,
                    'siswa_id' => $siswa_id,
                    'pertemuan_id' => $this->pertemuan->kelas_id,
                    'tanggal' => \Carbon\Carbon::now(),
                    'status' => 'Hadir',
                    'role' => 'Siswa',
                ]);
            }
        }
        
    }
    public function render(Pertemuan $pertemuan)
    {
        $siswas = Siswa::where('kelas_id', $this->pertemuan->kelas_id)->get();
        $siswaHadir = Absensi::where('kelas_id', $this->pertemuan->kelas_id)->get();
        // $kehadiran_siswa = Absensi::where('kelas_id', $kelas->id_kelas)->first();
        return view('livewire.kehadiran-siswa', compact('siswas', 'pertemuan', 'siswaHadir'));
    }
}
