<?php

namespace App\Http\Livewire;

use App\Models\Contato;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;
use Livewire\WithPagination;

class ListaContatos extends Component
{
    use WithFileUploads;
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $photo;
   

    public function render()
    {
        //$this->contatos = Contato::all();
        $contatos = Contato::paginate(4);
       
        return view('livewire.lista-contatos', ['contatos' => $contatos]);
    }

    public function storagePhoto($id)
    {
        $this->validate([
            'photo' => 'required|image|max:1024'
        ]);

        $contato = Contato::find($id);

        $nameFile = Str::slug($contato->nome) . '.' . $this->photo->getClientOriginalExtension();

        if ($path = $this->photo->storeAs('contatos', $nameFile)) {

            $contato->photo_path = $path; 
            $contato->save();
        }

        return back()->with('success', 'Foto alterada com sucesso!');
    }

    public function destroy($id)
    {
        $contato = Contato::find($id);
        $contato->delete();

        return back()->with('success','Contato apagado com sucesso!');
    }
}
