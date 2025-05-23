<div class="p-4">

    <div>
        <h2 class="mt-10 text-lg font-semibold">Lista de Clientes</h2>
        <div class="mt-4 overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-md">
                <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-700 border-b">Nome</th>
                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-700 border-b">Email</th>
                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-700 border-b">Telefone</th>
                    <th class="px-4 py-2 text-center text-sm font-medium text-gray-700 border-b">Ações</th>
                </tr>
                </thead>
                <tbody>
                @foreach($clientes as $cliente)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-2 text-sm text-gray-900 border-b">{{ $cliente->nome }}</td>
                        <td class="px-4 py-2 text-sm text-gray-500 border-b">{{ $cliente->email }}</td>
                        <td class="px-4 py-2 text-sm text-gray-500 border-b">{{ $cliente->telefone }}</td>
                        <td class="px-4 py-2 text-center border-b">
                            <button wire:click="editCliente({{ $cliente->id }})"
                                    class="text-blue-500 hover:text-blue-700 font-medium">
                                Editar
                            </button>
                            <button wire:click="deleteCliente({{ $cliente->id }})"
                                    class="text-red-500 hover:text-red-700 font-medium ml-4">
                                Remover
                            </button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="mt-4">
        {{ $clientes->links() }}
    </div>

</div>
