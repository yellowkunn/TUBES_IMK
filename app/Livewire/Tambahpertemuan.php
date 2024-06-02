<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Pertemuan;
use App\Models\Materi;
use App\Models\Tugas;
use App\Models\Link;
use App\Models\Kelas;
use Illuminate\Support\Facades\Auth;
class Tambahpertemuan extends Component
{
    use WithFileUploads;

    public $pertemuan;
    public $date;
    public $topikbahasan;
    public $deskripsi;
    public $tugas;
    public $materi;
    public $link;
    public $kelas;
    public $waktuakses;
    public $tanggalakses;
    public $waktuakses2;
    public $tanggalakses2;
    public $batas_waktu_akses_2;
    public $batas_tanggal_akses_2;

    public function mount(Kelas $kelas)
    {
        $this->kelas = $kelas;
    }

    public function tambahPertemuan()
    {
        dd([
            'pengajar_id' => Auth::user()->id_pengguna,
            'kelas_id' => $this->kelas->id_kelas,
            'pertemuan_ke' => $this->pertemuan,
            'tgl_pertemuan' => $this->date,
            'judul' => $this->topikbahasan,
            'deskripsi' => $this->deskripsi,
            'tugas' => $this->tugas,
            'materi' => $this->materi,
            'link' => $this->link,
        ]);
        
        $user = Auth::user();

        $this->validate([
            'materi' => 'nullable|file|max:10240', // Maksimal 10MB
            'tugas' => 'nullable|file|max:10240',  // Maksimal 10MB
        ]);

        Pertemuan::create([
            'pengajar_id' => $user->id_pengguna,
            'kelas_id' => $this->kelas->id_kelas,
            'pertemuan_ke' => $this->pertemuan,
            'tgl_pertemuan' => $this->date,
            'judul' => $this->topikbahasan,
            'deskripsi' => $this->deskripsi
        ]);
        if ($this->materi) {
            $materiPath = $this->materi->store('materi', 'public');
            Materi::create([
                'pertemuan_id' => $this->pertemuan,
                'file_materi' => $materiPath,
                'jam_akses' => $this->waktuakses,
                'tgl_akses' => $this->tanggalakses,
            ]);
        }
        if ($this->tugas) {
            $tugasPath = $this->tugas->store('tugas', 'public');
            Tugas::create([
                'pertemuan_id' => $this->pertemuan,
                'file_tugas' => $tugasPath,
                'jam_akses' => $this->waktuakses2,
                'tgl_akses' => $this->tanggalakses2,
                'batas_jam_akses' => $this->batas_waktu_akses_2,
                'batas_tgl_akses' => $this->batas_tanggal_akses_2,
            ]);
        }
        Link::create([
            'pertemuan_id' => $this->pertemuan,
            'url' => $this->link
        ]);
    }
    public function render()
    {
        return view('livewire.tambahpertemuan');
    }
}
