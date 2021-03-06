<?php

namespace App\Http\Livewire;

use App\Models\Contato;
use Illuminate\Contracts\Session\Session;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;
use Livewire\WithPagination;

class ContactForm extends Component
{
    use WithFileUploads;
    use WithPagination;

    public $name;
    public $email;
   // public $contatos;
    public $photo;
    public $telefone;
    public $instagram;
    public $twitter;
    public $facebook;
 
    protected $rules = [
        'name' => 'required|min:6',
        'email' => 'required|email',
        'telefone' => 'required|min:11',
        ];

    protected $messages = [
        'email.required' => 'O email não pode estar vazio.',
        'name.required' => 'O nome não pode estar vazio.',
        'name.min' => 'O nome precisa ter mais de 6 caracteres',
        'email.email' => 'O email precisa ser de um formato válido.',
    ];

    public function updated()
    {
        
       // $this->validate(); Caso precise da validação em tempo real é só chamar o this validate no metodo updated
    }
 
    public function submit()
    {
     
        $this->validate();

        $validaEmail = $this->validaEmail($this->email);

        if($validaEmail == true){
           return back()->with('danger', 'Email já cadastrado');
        }
        
        Contato::create([
            'nome' => $this->name,
            'email' => $this->email,
            'telefone' => $this->telefone,
            'instagram' => $this->instagram,
            'facebook' => $this->facebook,
            'twitter' => $this->twitter,
        ]);

        $this->name = "";
        $this->email = "" ;
        $this->telefone = "" ;
        $this->instagram = "" ;
        $this->facebook = "" ;
        $this->twitter = "" ;
        

        return back()->with('success', 'Contato salvo com sucesso!');
    }

    public function render()
    {
        return view('livewire.contact-form');
    }

    public function destroy($id)
    {
        $contato = Contato::find($id);
        $contato->delete();

        return back()->with('success','Contato apagado com sucesso!');
    }

    private function validaEmail($email){
      $email = Contato::where('email', $email)->first();

      if($email){
          return true;
      }
      return false;
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

}
