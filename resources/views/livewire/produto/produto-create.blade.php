<div class="min-h-screen bg-amber-50 py-8 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md mx-auto">
        <div class="bg-white rounded-xl shadow-lg overflow-hidden border-2 border-amber-300">
            <!-- Cabeçalho -->
            <div class="bg-gradient-to-r from-amber-400 to-orange-500 p-6 text-center">
                <h2 class="text-2xl font-bold text-white">
                    <span class="inline-block mr-2">🍔</span>
                    Cadastrar Novo Produto
                </h2>
            </div>

            <!-- Mensagens -->
            <div class="px-6 pt-4">
                @if (session()->has('success'))
                    <div class="mb-4 p-3 bg-green-100 border-l-4 border-green-500 text-green-700 rounded">
                        {{ session('success') }}
                    </div>
                @endif

                @if (session()->has('error'))
                    <div class="mb-4 p-3 bg-red-100 border-l-4 border-red-500 text-red-700 rounded">
                        {{ session('error') }}
                    </div>
                @endif
            </div>

            <!-- Formulário -->
            <form wire:submit.prevent="store" class="p-6 space-y-6">
                <!-- Nome -->
                <div>
                    <label for="nome" class="block text-sm font-medium text-amber-800">Nome do Produto*</label>
                    <input wire:model="nome" type="text" id="nome" 
                           class="mt-1 block w-full rounded-md border-amber-300 shadow-sm focus:border-amber-500 focus:ring-amber-500
                                  @error('nome') border-red-500 @enderror"
                           placeholder="Ex: X-Burger Especial">
                    @error('nome') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>

                <!-- Ingredientes -->
                <div>
                    <label for="ingredientes" class="block text-sm font-medium text-amber-800">Ingredientes*</label>
                    <textarea wire:model="ingredientes" id="ingredientes" rows="3"
                              class="mt-1 block w-full rounded-md border-amber-300 shadow-sm focus:border-amber-500 focus:ring-amber-500
                                     @error('ingredientes') border-red-500 @enderror"
                              placeholder="Liste os ingredientes..."></textarea>
                    @error('ingredientes') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>

                <!-- Valor -->
                <div>
                    <label for="valor" class="block text-sm font-medium text-amber-800">Valor (R$)*</label>
                    <input wire:model="valor" type="number" step="0.01" min="0.01" id="valor"
                           class="mt-1 block w-full rounded-md border-amber-300 shadow-sm focus:border-amber-500 focus:ring-amber-500
                                  @error('valor') border-red-500 @enderror"
                           placeholder="0,00">
                    @error('valor') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>

                <!-- Imagem (Opcional) -->
                <div>
                    <label for="imagem" class="block text-sm font-medium text-amber-800">
                        Imagem do Produto (Opcional)
                    </label>
                    <input wire:model="imagem" type="file" id="imagem" accept="image/jpeg,image/png"
                           class="mt-1 block w-full text-sm text-amber-700
                                  file:mr-4 file:py-2 file:px-4
                                  file:rounded-md file:border-0
                                  file:text-sm file:font-semibold
                                  file:bg-amber-50 file:text-amber-700
                                  hover:file:bg-amber-100
                                  @error('imagem') border-red-500 @enderror">
                    <p class="mt-1 text-xs text-amber-600">
                        Formatos aceitos: JPG, PNG (máx. 2MB)
                    </p>
                    @error('imagem') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                    
                    @if ($imagem)
                        <div class="mt-2">
                            <span class="block text-sm text-amber-600">Pré-visualização:</span>
                            <img src="{{ $imagem->temporaryUrl() }}" class="mt-1 h-32 rounded-md border border-amber-200">
                        </div>
                    @endif
                </div>

                <!-- Botão -->
                <div class="pt-4">
                    <button type="submit" 
                            class="w-full flex justify-center py-3 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-amber-600 hover:bg-amber-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-amber-500">
                        <span class="mr-2">➕</span>
                        Cadastrar Produto
                    </button>
                </div>

                <p class="text-xs text-gray-500 mt-4">
                    * Campos obrigatórios
                </p>
            </form>
        </div>
    </div>
</div>