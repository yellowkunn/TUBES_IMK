<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Tugas;
use App\Models\Pertemuan;
use Livewire\WithFileUploads;
class DetailPertemuanLatihan extends Component
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

    public function addlatihan($i){      
        $this->i = $i + 1;
        array_push($this->boxinputlatihan, $i);
    }

    public function removelatihan($key){
        unset($this->boxinputlatihan[$key]);
    }

    public function tambahlatihan()
    {
        foreach ($this->filelatihan as $file) {
            $tugasPath = $file->store('latihan', 'public');
            Tugas::create([
                'pertemuan_id' => $this->pertemuan->id_pertemuan,
                'file_tugas' => $tugasPath,
                'nama_asli_file_tugas' => $file->getClientOriginalName(), // Simpan nama asli file
                'jam_akses' => $this->waktuakses2,
                'tgl_akses' => $this->tanggalakses2,
                'jam_batas_akses' => $this->batas_waktu_akses_2,
                'tgl_batas_akses' => $this->batas_tanggal_akses_2,
            ]);
        }
    }
    
    public function render()
    {
        return view('livewire.detail-pertemuan-latihan');
    }
}
