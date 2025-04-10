<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Cliente;
use Illuminate\Support\Facades\Auth;

class Clientes extends Component
{

    public $clientes;
    public $cliente;
    public $nome;
    public $email;
    public $telefone;
    public $clienteId;


//    TODO: Adicionar refresh pelo livewire, remover o $this->clientes = Cliente::all();

    public function createCliente()
    {
        Cliente::create([
            'nome' => $this->nome,
            'email' => $this->email,
            'telefone' => $this->telefone,
            'user_id' => Auth::id(), // Adiciona o ID do usuário autenticado
        ]);

        $this->reset(['nome', 'email', 'telefone']);
        $this->clientes = Cliente::all();

    }

    public function editCliente($id)
    {
        $cliente = Cliente::find($id);
        if ($cliente) {
            $this->clienteId = $cliente->id;
            $this->nome = $cliente->nome;
            $this->email = $cliente->email;
            $this->telefone = $cliente->telefone;
            $this->clientes = Cliente::all();
        }
    }


    public function deleteCliente($id)
    {
        $cliente = Cliente::find($id);
        if ($cliente) {
            $cliente->delete();
            $this->clientes = Cliente::all();
        } else {
            // Substitui o dd por uma mensagem de erro amigável
            session()->flash('error', 'Cliente não encontrado.');
        }
    }



    public function mount()
    {
        $this->clientes = Cliente::all();
    }

    public function render()
    {
        return view('livewire.clientes', [
            'clientes' => $this->clientes,
        ]);
    }
}
