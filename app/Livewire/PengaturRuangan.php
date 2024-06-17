<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Kelas;
use App\Models\User;

class PengaturRuangan extends Component
{
    public $search;
    public function render()
    {
        return view('livewire.pengatur-ruangan' ,[
            'kelasJamkos' => Kelas::whereNull('jam')->where('nama', 'like', "%{$this->search}%")->get(),
            'kelass' => Kelas::whereNotNull('jam')->where('nama', 'like', "%{$this->search}%")->get(),
            'pengajars' => User::where('role', 'pengajar')->get()
        ]);
    }
}
