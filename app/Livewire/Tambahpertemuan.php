<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Pertemuan;
use App\Models\Materi;
use App\Models\Tugas;
use App\Models\Link;
use App\Models\Kelas;
use Illuminate\Support\Facades\Auth;
class Tambahpertemuan extends Component
{
    public $pertemuan;
    public $date;
    public $topikbahasan;
    public $deskripsi;
    public $tugas;
    public $link;
    public $kelas;
    

    public function mount(Kelas $kelas)
    {
        $this->kelas = $kelas;
    }

    public function tambahPertemuan(Kelas $kelas)
    {

        dd([
            'pengajar_id' => Auth::user()->id_pengguna,
            'kelas_id' => $this->kelas->id_kelas,
            'pertemuan_ke' => $this->pertemuan,
            'tgl_pertemuan' => $this->date,
            'judul' => $this->topikbahasan,
            'deskripsi' => $this->deskripsi,
            'tugas' => $this->tugas,
            'link' => $this->link
        ]);
        $user = Auth::user();
        Pertemuan::create([
            'pengajar_id' => $user->id_pengguna,
            'kelas_id' => $this->kelas->id_kelas,
            'pertemuan_ke' => $this->pertemuan,
            'tgl_pertemuan' => $this->date,
            'judul' => $this->topikbahasan,
            'deskripsi' => $this->deskripsi
        ]);
        Materi::create([
            'pertemuan_id' => $this->pertemuan,
            'file_materi' => $this->materi
        ]);
        Tugas::create([
            'pertemuan_id' => $this->pertemuan,
            'file_tugas' => $this->tugas
        ]);
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
