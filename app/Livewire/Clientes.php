<?php

namespace App\Livewire;

use Livewire\Attributes\On;
use Livewire\Component;
use App\Models\Cliente;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;

class Clientes extends Component
{
    use WithPagination;


    public $client;
    public $nome;
    public $email;
    public $telefone;
    public $clienteId;




//    public function editCliente($id)
//    {
//        $cliente = Cliente::find($id);
//        if ($cliente) {
//            $this->clienteId = $cliente->id;
//            $this->nome = $cliente->nome;
//            $this->email = $cliente->email;
//            $this->telefone = $cliente->telefone;
//            $this->dispatch('editCliente', $cliente);
//        }
//    }

    public function editCliente($id)
    {
        $cliente = Cliente::find($id);
        if ($cliente) {
            $this->dispatch('openEditModal', [
                'id' => $cliente->id,
                'nome' => $cliente->nome,
                'email' => $cliente->email,
                'telefone' => $cliente->telefone,
            ]);
        }
    }


    public function deleteCliente($id)
    {
        $cliente = Cliente::find($id);
        if ($cliente) {
            $cliente->delete();
        } else {
            // Substitui o dd por uma mensagem de erro amigável
            session()->flash('error', 'Cliente não encontrado.');
        }
    }

    public function submit()
    {
        if ($this->clienteId) {
            $this->editCliente($this->clienteId);
        } else {
            $this->createCliente();
        }
    }


    public function mount()
    {
    }

    #[On('cliente::index::refresh')]
    public function render()
    {
        return view('livewire.clientes', [
            'clientes' => Cliente::paginate(10), // Use pagination
        ]);
    }
}
