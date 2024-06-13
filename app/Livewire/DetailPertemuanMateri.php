<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Materi;
use App\Models\Pertemuan;
use Livewire\WithFileUploads;

class DetailPertemuanMateri extends Component
{
    public $boxinputmateri = [];
    public $boxinputlatihan = [];
    public $inputType;
    public $waktutenggat = [];
    public $tanggaltenggat = [];
    public $filemateri = [];
    public $filelatihan = [];
    public $folder = [];
    public $i = 1;
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

    use WithFileUploads;
    // stel cepat makanya byk variabelnya

    public function mount(Pertemuan $pertemuan)
    {
        $this->pertemuan = $pertemuan;
    }
    
    public function addmateri($i){      
        $this->i = $i + 1;
        array_push($this->boxinputmateri, $i);
    }

    public function removemateri($key){
        unset($this->boxinputmateri[$key]);
    }

    public function tambahmateri()
    {
        foreach ($this->filemateri as $file) {
            $materiPath = $file->store('materi', 'public');
            Materi::create([
                'pertemuan_id' => $this->pertemuan->id_pertemuan,
                'file_materi' => $materiPath,
                'nama_asli_file_materi' => $file->getClientOriginalName(), // Simpan nama asli file
                'jam_akses' => $this->waktuakses,
                'tgl_akses' => $this->tanggalakses,
            ]);
        }

    }
    public function render()
    {
        return view('livewire.detail-pertemuan-materi');
    }
}
