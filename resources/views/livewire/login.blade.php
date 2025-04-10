<div class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="w-full max-w-md">
        <div class="bg-white shadow-md rounded-lg">
            <div class="bg-blue-600 text-white text-center py-4 rounded-t-lg">
                <h2 class="text-xl font-bold">{{ __('Login') }}</h2>
            </div>

            <div class="p-6">
                <!-- Exibe mensagens de erro -->
                @if (session()->has('error'))
                    <div class="mb-4 text-sm text-red-600 bg-red-100 p-3 rounded">
                        {{ session('error') }}
                    </div>
                @endif

                <form wire:submit.prevent="login" class="space-y-4">
                    <!-- Campo de E-mail -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">{{ __('E-mail') }}</label>
                        <input wire:model="email" type="email" id="email" required autofocus
                               class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 @error('email') border-red-500 @enderror">
                        @error('email') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                    </div>

                    <!-- Campo de Senha -->
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700">{{ __('Senha') }}</label>
                        <input wire:model="password" type="password" id="password" required
                               class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 @error('password') border-red-500 @enderror">
                        @error('password') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                    </div>

                    <!-- Botão de Login -->
                    <div>
                        <button type="submit"
                                class="w-full bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                            {{ __('Entrar') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
