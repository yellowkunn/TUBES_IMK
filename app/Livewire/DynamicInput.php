<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class DynamicInput extends Component
{
    use WithFileUploads;
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

    public function render()
    {
        return view('livewire.dynamic-input');
    }
}
