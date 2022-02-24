<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Formulario extends Component
{
    public $teste;

    public function render()
    {
        
        return view('livewire.formulario');
    }

    public function save()
    {
        $this->validate();
    }
}
