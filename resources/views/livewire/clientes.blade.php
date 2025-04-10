<div class="max-w-md mx-auto mt-10 p-6 bg-white rounded-lg shadow-md">
    @if (session()->has('error'))
        <div class="text-red-500">
            {{ session('error') }}
        </div>
    @endif
    <form wire:submit.prevent="{{ $clienteId ? 'updateCliente' : 'createCliente' }}" class="space-y-4">
        <div>
            <label for="nome" class="block text-sm font-medium text-gray-700">Nome</label>
            <input type="text" id="nome" wire:model="nome" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
        </div>
        <div>
            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
            <input type="email" id="email" wire:model="email" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
        </div>
        <div>
            <label for="telefone" class="block text-sm font-medium text-gray-700">Telefone</label>
            <input type="text" id="telefone" wire:model="telefone" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
        </div>
        <button type="submit" class="w-full bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
            {{ $clienteId ? 'Atualizar Cliente' : 'Adicionar Cliente' }}
        </button>
    </form>

    <h2 class="mt-10 text-lg font-semibold">Lista de Clientes</h2>
    <ul class="mt-4 space-y-2">
        @foreach($clientes as $cliente)
            <li class="flex justify-between items-center p-4 bg-gray-100 rounded-md">
                <div>
                    <p class="text-sm font-medium">{{ $cliente->nome }}</p>
                    <p class="text-sm text-gray-500">{{ $cliente->email }}</p>
                    <p class="text-sm text-gray-500">{{ $cliente->telefone }}</p>
                </div>
                <div class="flex space-x-2">
                    <button wire:click="editCliente({{ $cliente->id }})" class="text-blue-500 hover:text-blue-700">
                        Editar
                    </button>
                    <button wire:click="deleteCliente({{ $cliente->id }})" class="text-red-500 hover:text-red-700">
                        Remover
                    </button>
                </div>
            </li>
        @endforeach
    </ul>
</div>
