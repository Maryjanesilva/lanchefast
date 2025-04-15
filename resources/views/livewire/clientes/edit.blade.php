<div class="min-h-screen bg-amber-50 py-8 px-4">
    <div class="max-w-md mx-auto">
        <!-- Card do Formulário -->
        <div class="bg-white rounded-lg shadow-md overflow-hidden border-2 border-amber-300">
            <!-- Cabeçalho com tema de lanchonete -->
            <div class="bg-amber-500 p-6 text-center relative">
                <div class="absolute top-2 right-2 text-2xl">🍔</div>
                <h2 class="text-3xl font-bold text-white font-serif">
                    Burguer's House
                </h2>
                <p class="text-amber-100 mt-2 text-sm">Editar Cadastro</p>
            </div>

            <!-- Corpo do Formulário -->
            <div class="p-6">
                <!-- Mensagens de Status -->
                @if (session()->has('success'))
                    <div class="mb-4 p-3 bg-green-100 border-l-4 border-green-500 text-green-700 rounded">
                        <div class="flex items-center">
                            <span class="mr-2">✅</span>
                            <span>{{ session('success') }}</span>
                        </div>
                    </div>
                @endif

                @if (session()->has('error'))
                    <div class="mb-4 p-3 bg-red-100 border-l-4 border-red-500 text-red-700 rounded">
                        <div class="flex items-center">
                            <span class="mr-2">❌</span>
                            <span>{{ session('error') }}</span>
                        </div>
                    </div>
                @endif

                <!-- Formulário -->
                <form wire:submit.prevent="update" class="space-y-4">
                    <!-- Grupo de Campos -->
                    <div class="space-y-6">
                        <!-- Nome -->
                        <div>
                            <label class="block text-sm font-medium text-amber-800 mb-1">
                                <span class="inline-block w-4">👤</span> Nome Completo
                            </label>
                            <input wire:model="cliente.nome" type="text" 
                                   class="w-full px-4 py-2 rounded border border-amber-300 focus:ring-2 focus:ring-amber-500 focus:border-amber-500 @error('cliente.nome') border-red-500 @enderror">
                            @error('cliente.nome') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                        </div>

                        <!-- Endereço -->
                        <div>
                            <label class="block text-sm font-medium text-amber-800 mb-1">
                                <span class="inline-block w-4">🏠</span> Endereço
                            </label>
                            <input wire:model="cliente.endereco" type="text"
                                   class="w-full px-4 py-2 rounded border border-amber-300 focus:ring-2 focus:ring-amber-500 focus:border-amber-500 @error('cliente.endereco') border-red-500 @enderror">
                            @error('cliente.endereco') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                        </div>

                        <!-- Telefone -->
                        <div>
                            <label class="block text-sm font-medium text-amber-800 mb-1">
                                <span class="inline-block w-4">📱</span> Telefone
                            </label>
                            <input wire:model="cliente.telefone" type="tel" x-mask="(99) 99999-9999"
                                   class="w-full px-4 py-2 rounded border border-amber-300 focus:ring-2 focus:ring-amber-500 focus:border-amber-500 @error('cliente.telefone') border-red-500 @enderror">
                            @error('cliente.telefone') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                        </div>

                        <!-- CPF -->
                        <div>
                            <label class="block text-sm font-medium text-amber-800 mb-1">
                                <span class="inline-block w-4">🆔</span> CPF
                            </label>
                            <input wire:model="cliente.cpf" type="text" x-mask="999.999.999-99"
                                   class="w-full px-4 py-2 rounded border border-amber-300 focus:ring-2 focus:ring-amber-500 focus:border-amber-500 @error('cliente.cpf') border-red-500 @enderror">
                            @error('cliente.cpf') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                        </div>

                        <!-- Email -->
                        <div>
                            <label class="block text-sm font-medium text-amber-800 mb-1">
                                <span class="inline-block w-4">✉️</span> E-mail
                            </label>
                            <input wire:model="cliente.email" type="email"
                                   class="w-full px-4 py-2 rounded border border-amber-300 focus:ring-2 focus:ring-amber-500 focus:border-amber-500 @error('cliente.email') border-red-500 @enderror">
                            @error('cliente.email') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                        </div>

                        <!-- Senha -->
                        <div>
                            <label class="block text-sm font-medium text-amber-800 mb-1">
                                <span class="inline-block w-4">🔒</span> Nova Senha (opcional)
                            </label>
                            <input wire:model="senha" type="password"
                                   class="w-full px-4 py-2 rounded border border-amber-300 focus:ring-2 focus:ring-amber-500 focus:border-amber-500 @error('senha') border-red-500 @enderror"
                                   placeholder="Deixe em branco para manter a atual">
                            @error('senha') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                        </div>

                        <!-- Confirmação de Senha -->
                        <div>
                            <label class="block text-sm font-medium text-amber-800 mb-1">
                                <span class="inline-block w-4">🔏</span> Confirme a Senha
                            </label>
                            <input wire:model="senha_confirmation" type="password"
                                   class="w-full px-4 py-2 rounded border border-amber-300 focus:ring-2 focus:ring-amber-500 focus:border-amber-500">
                        </div>
                    </div>

                    <!-- Botões -->
                    <div class="pt-4 flex space-x-4">
                        <button type="submit" 
                                class="flex-1 py-3 px-4 bg-amber-600 hover:bg-amber-700 text-white font-bold rounded-md shadow-md transition duration-300 flex items-center justify-center">
                            <span class="mr-2">💾</span>
                            Salvar Alterações
                        </button>
                        
                        <a href="{{ route('clientes.index') }}" 
                           class="flex-1 py-3 px-4 bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold rounded-md shadow-md transition duration-300 flex items-center justify-center">
                            <span class="mr-2">↩️</span>
                            Voltar
                        </a>
                    </div>
                </form>
            </div>

            <!-- Rodapé -->
            <div class="bg-amber-100 px-6 py-3 text-center text-sm text-amber-800">
                Atualize seus dados para receber promoções!
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
@endpush