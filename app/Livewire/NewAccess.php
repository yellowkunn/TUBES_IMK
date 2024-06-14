<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Pertemuan;
use App\Models\BaruDiakses;
use Illuminate\Support\Facades\Auth;

class NewAccess extends Component
{
    public $groupedPertemuans;
    public $p;
    
    public function mount($groupedPertemuans)
    {
        $this->groupedPertemuans = $groupedPertemuans;
    }

    public function newAccess($pertemuan_id)
    {
        $p = Pertemuan::find($pertemuan_id);
        if (!$p) {
            // Jika kelas tidak ditemukan, bisa Anda tambahkan logika untuk menangani hal ini
            return;
        }

        $pengguna_id = Auth::user()->id_pengguna;

        $baruDiakses = BaruDiakses::where('pertemuan_id', $pertemuan_id)->first();

        if ($baruDiakses) {
            // Jika ada, update data
            $baruDiakses->update([
                'pengguna_id' => $pengguna_id,
                'pertemuan_id' => $pertemuan_id,
                'baru_diakses' => now()->toTimeString(), // Waktu saat fungsi dijalankan
            ]);
        } else {
            // Jika tidak ada, buat data baru
            BaruDiakses::insert([
                'pengguna_id' => $pengguna_id,
                'pertemuan_id' => $pertemuan_id,
                'baru_diakses' => now()->toTimeString(),
            ]);
        }

    }
    public function render()
    {
        return view('livewire.new-access');
    }
}
