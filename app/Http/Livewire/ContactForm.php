<?php

namespace App\Http\Livewire;

use App\Models\Contato;
use Illuminate\Contracts\Session\Session;
use Livewire\Component;

class ContactForm extends Component
{

    public $name;
    public $email;
    public $contatos;
 
    protected $rules = [
        'name' => 'required|min:6',
        'email' => 'required|email',
    ];

    protected $messages = [
        'email.required' => 'O email não pode estar vazio.',
        'name.required' => 'O nome não pode estar vazio.',
        'name.min' => 'O nome precisa ter mais de 6 caracteres',
        'email.email' => 'O email precisa ser de um formato válido.',
    ];

    public function updated()
    {
        $this->contatos = Contato::all();
        $this->validate();
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
        ]);

        $this->name = "";
        $this->email = "" ;
        

        return back()->with('success', 'Contato salvo com sucesso!');
    }

    public function render()
    {
        $this->contatos = Contato::all();
        
        return view('livewire.contact-form');
    }

    private function validaEmail($email){
      $email = Contato::where('email', $email)->first();

      if($email){
          return true;
      }
      return false;
    }
}
