<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class DynamicInput extends Component
{
    use WithFileUploads;
    public $inputs = [];
    public $inputType;
    public $file = [];
    public $folder = [];
    public $i = 1;

    public function add($i){      
        $this->i = $i + 1;
        array_push($this->inputs, $i);
    }

    public function remove($key){
        unset($this->inputs[$key]);
    }

    public function render()
    {
        return view('livewire.dynamic-input');
    }
}
