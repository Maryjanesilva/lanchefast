<div class="min-h-screen bg-[#fef6e4] py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-lg mx-auto">
        <div class="bg-white border-4 border-[#fbbf24] rounded-2xl shadow-xl overflow-hidden">
            <!-- Cabeçalho -->
            <div class="bg-gradient-to-r from-[#f97316] to-[#fbbf24] p-6 text-center">
                <h2 class="text-3xl font-extrabold text-white tracking-wide">🍔 Cadastro de Cliente</h2>
                <p class="text-white text-sm mt-1">Complete com seus dados e aproveite os lanches!</p>
            </div>

            <!-- Formulário -->
            <form wire:submit.prevent="store" class="p-8 space-y-6">
                @if (session()->has('message'))
                    <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded shadow-sm">
                        ✅ {{ session('message') }}
                    </div>
                @endif

                <!-- Nome -->
                <div>
                    <label for="nome" class="block text-sm font-semibold text-[#78350f]">Nome</label>
                    <input wire:model="nome" id="nome" type="text"
                        class="mt-1 w-full rounded-lg border border-amber-300 shadow-sm focus:border-orange-400 focus:ring-orange-400"
                        placeholder="Ex: João Lancheiro">
                    @error('nome') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <!-- Endereço -->
                <div>
                    <label for="endereco" class="block text-sm font-semibold text-[#78350f]">Endereço</label>
                    <input wire:model="endereco" id="endereco" type="text"
                        class="mt-1 w-full rounded-lg border border-amber-300 shadow-sm focus:border-orange-400 focus:ring-orange-400"
                        placeholder="Rua do X-Salada, 456">
                    @error('endereco') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <!-- Telefone -->
                <div>
                    <label for="telefone" class="block text-sm font-semibold text-[#78350f]">Telefone</label>
                    <input wire:model="telefone" id="telefone" type="tel"
                        class="mt-1 w-full rounded-lg border border-amber-300 shadow-sm focus:border-orange-400 focus:ring-orange-400"
                        placeholder="(00) 00000-0000">
                    @error('telefone') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <!-- CPF -->
                <div>
                    <label for="cpf" class="block text-sm font-semibold text-[#78350f]">CPF</label>
                    <input wire:model="cpf" id="cpf" type="text"
                        class="mt-1 w-full rounded-lg border border-amber-300 shadow-sm focus:border-orange-400 focus:ring-orange-400"
                        placeholder="000.000.000-00">
                    @error('cpf') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-semibold text-[#78350f]">E-mail</label>
                    <input wire:model="email" id="email" type="email"
                        class="mt-1 w-full rounded-lg border border-amber-300 shadow-sm focus:border-orange-400 focus:ring-orange-400"
                        placeholder="lancheiro@email.com">
                    @error('email') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <!-- Senha -->
                <div>
                    <label for="senha" class="block text-sm font-semibold text-[#78350f]">Senha</label>
                    <input wire:model="senha" id="senha" type="password"
                        class="mt-1 w-full rounded-lg border border-amber-300 shadow-sm focus:border-orange-400 focus:ring-orange-400"
                        placeholder="*******">
                    @error('senha') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <!-- Botão -->
                <div class="pt-4">
                    <button type="submit"
                        class="w-full bg-gradient-to-r from-orange-500 to-yellow-400 hover:from-orange-600 hover:to-yellow-500 text-white font-bold py-3 rounded-lg shadow-md transition duration-300">
                        🍟 Cadastrar Cliente
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
