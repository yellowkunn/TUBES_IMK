<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Kelas;
use Illuminate\Support\Facades\Auth;
use App\Models\Pengajar;

class Jadwal extends Component
{
    public $selectedClasses = [];
    public $pengajar;
    public function pilihJadwal($day)
    {
        $user = Auth::user();
        $pengajars = Pengajar::where('pengguna_id', $user->id_pengguna)->get();

        if ($pengajars->isNotEmpty()) {
            $kelas_ids = [];

            foreach ($pengajars as $pengajar) {
                $kelas_ids[] = $pengajar->kelas_id;
            }

            $this->selectedClasses = Kelas::whereIn('id_kelas', $kelas_ids)
                ->where('jadwal_hari', 'LIKE', "%$day%")
                ->get();
        } else {
            $this->selectedClasses = [];
        }
    }
    public function render()
    {
        return view('livewire.jadwal', [
            'classes' => $this->selectedClasses
        ]);
    }
}
