<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Kelas;
use App\Models\User;

class PengaturRuangan extends Component
{
    public $search = '';
    public $activeTab = 'belumDiatur'; // Add this property to track the active tab

    public function setActiveTab($tab)
    {
        $this->activeTab = $tab;
    }

    public function render()
    {
        $kelasJamkos = Kelas::whereNull('jam')
            ->where('nama', 'like', "%{$this->search}%")
            ->get();

        $kelass = Kelas::whereNotNull('jam')
            ->where('nama', 'like', "%{$this->search}%")
            ->get();

        $pengajars = User::where('role', 'pengajar')->get();

        return view('livewire.pengatur-ruangan', compact('kelasJamkos', 'kelass', 'pengajars'));
    }
}

