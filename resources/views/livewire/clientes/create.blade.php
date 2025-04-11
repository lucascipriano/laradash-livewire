<div>
    <button wire:click="openModal" class="px-4 py-2 bg-blue-600 text-white rounded cursor-pointer">
        Abrir Modal
    </button>

    @if ($showModal)
        <div wire:click="closeModal" class="fixed inset-0 bg-white/30 backdrop-blur-sm flex items-center justify-center z-50">
            <div @click.stop class="bg-white p-6 rounded shadow-xl w-1/3">
                <h2 class="text-lg font-bold mb-4">Crie um novo Cliente</h2>
                <p class="mb-4">Adicione as informações</p>

                {{--    CRUD    --}}
                <div class="max-w-md mx-auto mt-10 p-6 bg-white rounded-lg shadow-md">
                    @if (session()->has('error'))
                        <div class="text-red-500">
                            {{ session('error') }}
                        </div>
                    @endif
                    <form wire:submit.prevent="{{ $clienteId ? 'updateCliente' : 'createCliente' }}" class="space-y-4">
                        <div>
                            <label for="nome" class="block text-sm font-medium text-gray-700">Nome</label>
                            <input type="text" id="nome" wire:model="nome"
                                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                        </div>
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                            <input type="email" id="email" wire:model="email"
                                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                        </div>
                        <div>
                            <label for="telefone" class="block text-sm font-medium text-gray-700">Telefone</label>
                            <input type="text" id="telefone" wire:model="telefone"
                                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                        </div>
                        <button type="submit"
                                class="w-full bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                            {{ $clienteId ? 'Atualizar Cliente' : 'Adicionar Cliente' }}
                        </button>
                    </form>
                </div>

                {{--    FINAL CRUD  --}}
                <button wire:click="closeModal" class="px-4 py-2 bg-red-600 text-white rounded cursor-pointer">
                    Fechar
                </button>
            </div>
        </div>
    @endif
</div>
