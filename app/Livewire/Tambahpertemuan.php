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


    public $inputs = [];
    public $inputType;
    public $waktutenggat = [];
    public $tanggaltenggat = [];
    public $filemateri = [];
    public $filelatihan = [];
    public $folder = [];
    public $i = 1;

    public function add($i){      
        $this->i = $i + 1;
        array_push($this->inputs, $i);


        // if($this->inputType == 'materi'){
        // $this->waktutenggat[$this->i] = '';
        // $this->tanggaltenggat[$this->i] = '';
        // }
    }

    public function remove($key){
        unset($this->inputs[$key]);

        
        // if($this->inputType == 'latihan'){
        //     unset($this->waktutenggat[$key]);
        //     unset($this->tanggaltenggat[$key]);
        // }
    }













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
        if ($this->inputType == 'materi') {
            foreach ($this->filemateri as $key => $file) {
                $file->store('materi');
            }
        } elseif ($this->inputType == 'latihan') {
            foreach ($this->filelatihan as $key => $file) {
                $file->store('latihan');
            }
        }
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
        foreach ($this->filemateri as $file) {
            $materiPath = $file->store('materi', 'public');
            Materi::create([
                'pertemuan_id' => $this->pertemuan,
                'file_materi' => $materiPath,
                'jam_akses' => $this->waktuakses,
                'tgl_akses' => $this->tanggalakses,
            ]);
        }
        foreach ($this->filelatihan as $file) {
            $tugasPath = $file->store('latihan', 'public');
            Tugas::create([
                'pertemuan_id' => $this->pertemuan,
                'file_tugas' => $tugasPath,
                'jam_akses' => $this->waktuakses2,
                'tgl_akses' => $this->tanggalakses2,
                'jam_batas_akses' => $this->batas_waktu_akses_2,
                'tgl_batas_akses' => $this->batas_tanggal_akses_2,
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
