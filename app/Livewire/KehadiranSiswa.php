<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Siswa;
use App\Models\Kelas;
use App\Models\Absensi;
use Carbon\Carbon;


class KehadiranSiswa extends Component
{

    public $kelas;
    public $kehadiran_siswas = [];
    public $pengajar;
    public function mount(Kelas $kelas)
    {
        $this->kelas = $kelas;
    }

    public function kehadiranSiswas()
    {
        foreach ($this->kehadiran_siswas as $siswa_id => $kehadiran) {
            if ($kehadiran) {
                Absensi::insert([
                    'pengajar_id' => $this->kelas->pengajar[0]->id_pengajar,
                    'siswa_id' => $siswa_id,
                    'kelas_id' => $this->kelas->id_kelas,
                    'tanggal' => \Carbon\Carbon::now(),
                    'status' => 'Hadir',
                    'role' => 'Siswa',
                ]);
            }
        }
        
    }
    public function render(Kelas $kelas)
    {
        $siswas = Siswa::where('kelas_id', $this->kelas->id_kelas)->get();
        $kehadiran_siswa = Absensi::where('kelas_id', $kelas->id_kelas)->first();
        return view('livewire.kehadiran-siswa', compact('siswas', 'kelas', 'kehadiran_siswa'));
    }
}
