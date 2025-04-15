<div class="min-h-screen bg-amber-50 py-8 px-4">
    <div class="max-w-6xl mx-auto">
        <!-- Cabeçalho -->
        <div class="bg-amber-500 rounded-lg shadow-md p-6 mb-6 text-center">
            <h1 class="text-3xl font-bold text-white font-serif">
                🍔 Burguer's House - Clientes
            </h1>
            <p class="text-amber-100 mt-2">Gerencie os clientes cadastrados</p>
        </div>

        <!-- Barra de Ações -->
        <div class="bg-white rounded-lg shadow-md p-4 mb-6 flex flex-col sm:flex-row justify-between items-center">
            <div class="mb-4 sm:mb-0">
                <input wire:model.debounce.300ms="search" type="text" 
                       class="px-4 py-2 border border-amber-300 rounded-md focus:ring-amber-500 focus:border-amber-500" 
                       placeholder="Pesquisar clientes...">
            </div>
            
            <div class="flex space-x-2">
                <select wire:model="perPage" class="px-4 py-2 border border-amber-300 rounded-md">
                    <option value="10">10 por página</option>
                    <option value="25">25 por página</option>
                    <option value="50">50 por página</option>
                </select>
                
                <a href="{{ route('clientes.create') }}" 
                   class="px-4 py-2 bg-amber-600 hover:bg-amber-700 text-white rounded-md shadow flex items-center">
                    <span class="mr-2">➕</span> Novo Cliente
                </a>
            </div>
        </div>

        <!-- Mensagens -->
        @if (session()->has('success'))
            <div class="mb-6 p-4 bg-green-100 border-l-4 border-green-500 text-green-700 rounded">
                <div class="flex items-center">
                    <span class="mr-2">✅</span>
                    <span>{{ session('success') }}</span>
                </div>
            </div>
        @endif

        <!-- Tabela de Clientes -->
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-amber-200">
                    <thead class="bg-amber-100">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-amber-800 uppercase tracking-wider">Nome</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-amber-800 uppercase tracking-wider">Telefone</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-amber-800 uppercase tracking-wider">E-mail</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-amber-800 uppercase tracking-wider">CPF</th>
                            <th class="px-6 py-3 text-right text-xs font-medium text-amber-800 uppercase tracking-wider">Ações</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-amber-200">
                        @forelse ($clientes as $cliente)
                            <tr class="hover:bg-amber-50">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="text-sm font-medium text-amber-900">{{ $cliente->nome }}</div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-amber-800">{{ $cliente->telefone ?? '--' }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-amber-800">{{ $cliente->email }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-amber-800">{{ $cliente->cpf }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <div class="flex justify-end space-x-2">
                                        <a href="{{ route('clientes.edit', $cliente->id) }}" 
                                           class="text-amber-600 hover:text-amber-900 px-3 py-1 rounded-md bg-amber-100 hover:bg-amber-200 transition">
                                            ✏️ Editar
                                        </a>
                                        <button wire:click="delete({{ $cliente->id }})" 
                                                onclick="return confirm('Tem certeza que deseja excluir este cliente?')"
                                                class="text-red-600 hover:text-red-900 px-3 py-1 rounded-md bg-red-100 hover:bg-red-200 transition">
                                            🗑️ Excluir
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-4 text-center text-sm text-amber-800">
                                    Nenhum cliente encontrado
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Paginação -->
            <div class="bg-amber-50 px-4 py-3 border-t border-amber-200">
                {{ $clientes->links() }}
            </div>
        </div>
    </div>
</div>