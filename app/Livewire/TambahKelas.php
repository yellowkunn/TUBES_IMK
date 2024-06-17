<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Kelas;

class TambahKelas extends Component
{
    public $search;

    public function render()
    {
        return view('livewire.tambah-kelas', [
            'kelass' => Kelas::orderBy('dibuat', 'asc')->where('nama', 'like', "%{$this->search}%")->get()
        ]);
        
        
    }
}
