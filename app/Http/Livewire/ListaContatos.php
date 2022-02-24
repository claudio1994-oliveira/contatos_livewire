<?php

namespace App\Http\Livewire;

use App\Models\Contato;
use Livewire\Component;

class ListaContatos extends Component
{

    public $contatos;

    public function updatedContatos()
    {
        $this->contatos = Contato::all();
    }
   

    public function render()
    {
        $this->contatos = Contato::all();
        //$this->contatos = $this->updatingListaContatos();
       
        return view('livewire.lista-contatos');
    }
}
