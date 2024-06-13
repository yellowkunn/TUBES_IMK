<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Link;
use App\Models\Pertemuan;
use Livewire\WithFileUploads;

class DetailPertemuanLink extends Component
{

    public $boxinputlink = [];
    public $boxinputlatihan = [];
    public $inputType;
    public $waktutenggat = [];
    public $tanggaltenggat = [];
    public $links = [];
    public $i = 1;
    public $pertemuan;
    public $link;

    use WithFileUploads;
    // stel cepat makanya byk variabelnya

    public function mount(Pertemuan $pertemuan)
    {
        $this->pertemuan = $pertemuan;
    }

    public function addlink($i){      
        $this->i = $i + 1;
        array_push($this->boxinputlink, $i);
    }

    public function removelink($key){
        unset($this->boxinputlink[$key]);
    }

    public function tambahlink()
    {
        foreach ($this->links as $link) {
            Link::create([
                'pertemuan_id' => $this->pertemuan->id_pertemuan,
                'url' => $link
            ]);
        }
    }

    public function render()
    {
        return view('livewire.detail-pertemuan-link');
    }
}
