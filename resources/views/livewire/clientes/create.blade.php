<div>
    <button wire:click="openModal" class="px-4 py-2 bg-blue-600 text-white rounded cursor-pointer">
        Abrir Modal
    </button>

    @if ($showModal)
        <div wire:click="closeModal" class="fixed inset-0 bg-white/30 backdrop-blur-sm flex items-center justify-center z-50">
            <div @click.stop class="bg-white p-6 rounded shadow-xl w-full max-w-lg mx-4 sm:w-2/3 md:w-1/2 lg:w-1/3">
                <h2 class="text-lg font-bold mb-4">Crie um novo Cliente</h2>
                <p class="mb-4">Adicione as informações</p>

                <form wire:submit.prevent="{{ $clienteId ? 'updateCliente' : 'createCliente' }}" class="space-y-4">
                    <div>
                        <label for="nome" class="block text-sm font-medium text-gray-700">Nome</label>
                        <input type="text" id="nome" wire:model.live="nome"
                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"/>
                        @error('nome')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" id="email" wire:model.live="email"
                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                        @error('email')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <label for="telefone" class="block text-sm font-medium text-gray-700">Telefone</label>
                        <input type="text" id="telefone" wire:model.live="telefone"
                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                        @error('telefone')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="grid grid-cols-1 gap-1 md:gap-2 md:grid-cols-2">
                        <button type="submit"
                                class="mt-5 w-full bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                            {{ $clienteId ? 'Atualizar Cliente' : 'Adicionar Cliente' }}
                        </button>
                        <button wire:click="closeModal"
                                class="mt-5 w-full bg-red-600 text-white py-2 px-4 rounded-md hover:bg-red-500 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">
                            Fechar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    @endif
</div>
