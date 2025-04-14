<?php

namespace App\Livewire\Clientes;

use App\Models\Cliente;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Attributes\Rule;
use Livewire\Component;

class Create extends Component
{
    public bool $showModal = false;

    public function openModal()
    {
        $this->reset(['nome', 'email', 'telefone', 'clienteId']);
        $this->resetValidation();
        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->resetValidation();
        $this->showModal = false;
    }


    public $clientes;

    #[Rule(['required', 'string', 'min:3'])]
    public $nome;


    #[Rule(['required', 'email', 'string', 'max:255', 'unique:clientes,email'])]
    public $email;

    #[Rule(['required', 'string', 'min:10', 'max:15'])]
    public $telefone;
    public $clienteId;

    public function createCliente()
    {
        $this->validate();

        Cliente::create([
            'nome' => $this->nome,
            'email' => $this->email,
            'telefone' => $this->telefone,
            'user_id' => Auth::id(),
        ]);


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
        $this->reset();

        $this->showModal = false;
    }


    #[On('openEditModal')]
    public function openEditModal($data)
    {

        $this->clienteId = $data['id'];
        $this->nome = $data['nome'];
        $this->email = $data['email'];
        $this->telefone = $data['telefone'];
        $this->showModal = true;
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
//            Faça uma condição pára verficar se o cliente foi atualizado
            if ($cliente->wasChanged()) {
                $this->dispatch('toastify', [
                    'msg' => 'Cliente atualizado com sucesso!',
                    'duration' => 2000,
                    'gravity' => 'top',
                    'position' => 'right',
                    'style' => [
                        'background' => '#4CAF50',
                    ],
                ]
                );
                $this->dispatch('toastify', [
                    'msg' => 'Cliente atualizado com sucesso!',
                    'duration' => 2000,
                    'gravity' => 'top',
                    'position' => 'right',
                    'style' => [
                        'background' => '#4CAF50',
                    ],
                ]);
                $this->showModal = false;
                $this->reset();

                $this->dispatch('cliente::index::refresh');
            } else {
                $this->showModal = false;
                $this->dispatch('toastify', [
                    'msg' => 'Nenhuma alteração foi feita no cliente.',
                    'duration' => 2000,
                    'gravity' => 'top',
                    'position' => 'right',
                    'style' => [
                        'background' => '#FFC107',
                    ],
                ]);
            }


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
