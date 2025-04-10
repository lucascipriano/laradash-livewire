<div class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="w-full max-w-md">
        <div class="bg-white shadow-md rounded-lg">
            <div class="bg-green-600 text-white text-center py-4 rounded-t-lg">
                <h2 class="text-xl font-bold">{{ __('Registrar') }}</h2>
            </div>

            <div class="p-6">
                <!-- Exibe mensagens de erro -->
                @if (session()->has('error'))
                    <div class="mb-4 text-sm text-red-600 bg-red-100 p-3 rounded">
                        {{ session('error') }}
                    </div>
                @endif

                <form wire:submit.prevent="register" class="space-y-4">
                    <!-- Campo de Nome -->
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">{{ __('Nome') }}</label>
                        <input wire:model="name" type="text" id="name" required autofocus
                               class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-green-500 focus:border-green-500 @error('name') border-red-500 @enderror">
                        @error('name') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                    </div>

                    <!-- Campo de E-mail -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">{{ __('E-mail') }}</label>
                        <input wire:model="email" type="email" id="email" required
                               class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-green-500 focus:border-green-500 @error('email') border-red-500 @enderror">
                        @error('email') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                    </div>

                    <!-- Campo de Senha -->
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700">{{ __('Senha') }}</label>
                        <input wire:model="password" type="password" id="password" required
                               class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-green-500 focus:border-green-500 @error('password') border-red-500 @enderror">
                        @error('password') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                    </div>

                    <!-- Confirmação de Senha -->
                    <div>
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-700">{{ __('Confirmar Senha') }}</label>
                        <input wire:model="password_confirmation" type="password" id="password_confirmation" required
                               class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-green-500 focus:border-green-500 @error('password_confirmation') border-red-500 @enderror">
                        @error('password_confirmation') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                    </div>

                    <!-- Botão de Registro -->
                    <div>
                        <button type="submit"
                                class="w-full bg-green-600 text-white py-2 px-4 rounded-lg hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
                            {{ __('Registrar') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
