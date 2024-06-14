<?php


namespace App\Livewire;

use Livewire\Component;
use App\Models\Pertemuan;

class FilterDetailPertemuan extends Component
{
    public $pertemuan;
    public $selectedBahan = ''; // Inisialisasi dengan string kosong

    public function mount(Pertemuan $pertemuan)
    {
        $this->pertemuan = $pertemuan;
    }

    public function filter_detail_pertemuan()
    {
        // Logika untuk memfilter berdasarkan $this->selectedBahan
        // Anda bisa menggunakan $this->selectedBahan di sini
    }

    public function render()
    {
        $p1 = $this->pertemuan;
        $kelas = $this->pertemuan->kelas_id;

        $pertemuan = Pertemuan::with('materi', 'tugas', 'link')
            ->where('id_pertemuan', $this->pertemuan->id_pertemuan)
            ->first();

        $materi = collect();
        $tugas = collect();
        $link = collect();

        if ($pertemuan) {
            $materi = $materi->merge($pertemuan->materi);
            $tugas = $tugas->merge($pertemuan->tugas);
            $link = $link->merge($pertemuan->link);
        }

        $groupedPertemuans = (object) [
            'materi' => $materi,
            'tugas' => $tugas,
            'link' => $link,
        ];

        return view('livewire.filter-detail-pertemuan', [
            'p1' => $p1,
            'groupedPertemuans' => $groupedPertemuans,
            'kelas' => $kelas
        ]);
    }
}

