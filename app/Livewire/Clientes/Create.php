<?php

namespace App\Livewire\Clientes;

use App\Models\Cliente;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;

class Create extends Component
{
    public bool $showModal = false;

    public function openModal()
    {
        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->showModal = false;
    }


    public $clientes;

    public $nome;
    public $email;
    public $telefone;
    public $clienteId;

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
        $this->dispatch('toastify', [
            'msg' => 'Salvo com sucesso!',
            'duration' => 2000,
            'gravity' => 'top',
            'position' => 'right',
            'style' => [
                'background' => '#4CAF50',
            ],
        ]);
        $this->dispatch('cliente::index::refresh');
        $this->showModal = false;
    }

    #[On('openEditModal')]
    public function openEditModal($data)
    {
        $this->clienteId = $data['id'];
        $this->nome = $data['nome'];
        $this->email = $data['email'];
        $this->telefone = $data['telefone'];
        $this->showModal = true; // Abre o modal
    }

    public function updateCliente()
    {
        $cliente = Cliente::find($this->clienteId);
        if ($cliente) {
            $cliente->update([
                'nome' => $this->nome,
                'email' => $this->email,
                'telefone' => $this->telefone,
            ]);

            $this->reset(['nome', 'email', 'telefone', 'clienteId']);
            $this->dispatch('toastify', [
                'msg' => 'Cliente atualizado com sucesso!',
                'duration' => 2000,
                'gravity' => 'top',
                'position' => 'right',
                'style' => [
                    'background' => '#4CAF50',
                ],
            ]);
            $this->showModal = false; // Fecha o modal
            $this->dispatch('cliente::index::refresh');
        }
    }

    public function mount()
    {
    }

    public function render()
    {
        return view('livewire.clientes.create');
    }

}
