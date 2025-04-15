<?php

namespace App\Livewire\Produto;

use App\Models\Produto;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class ProdutoCreate extends Component
{
    use WithFileUploads;

    public $nome;
    public $ingredientes;
    public $valor;
    public $imagem;

    protected $rules = [
        'nome' => 'required|string|max:255|unique:produtos,nome',
        'ingredientes' => 'required|string|max:1000',
        'valor' => 'required|numeric|min:0.01',
        'imagem' => 'nullable|image|mimes:jpg,jpeg,png|max:2048', // Agora é nullable
    ];

    protected $messages = [
        'nome.required' => 'O nome do produto é obrigatório.',
        'nome.unique' => 'Já existe um produto com este nome.',
        'ingredientes.required' => 'A lista de ingredientes é obrigatória.',
        'valor.required' => 'O valor do produto é obrigatório.',
        'valor.min' => 'O valor deve ser maior que zero.',
        'imagem.image' => 'O arquivo deve ser uma imagem válida.',
        'imagem.mimes' => 'A imagem deve ser JPG, JPEG ou PNG.',
        'imagem.max' => 'A imagem não pode ter mais que 2MB.',
    ];

    public function render()
    {
        return view('livewire.produto.produto-create')
            ->layout('components.layouts.app');
    }

    public function store()
    {
        $this->validate();

        try {
            $data = [
                'nome' => $this->nome,
                'ingredientes' => $this->ingredientes,
                'valor' => $this->valor,
                'disponivel' => true,
            ];

            // Apenas faz upload se uma imagem foi fornecida
            if ($this->imagem) {
                $data['imagem'] = $this->imagem->store('produtos', 'public');
            }

            Produto::create($data);

            session()->flash('success', '🍔 Produto cadastrado com sucesso!');
            return redirect()->route('produtos.index');

        } catch (\Exception $e) {
            // Remove a imagem se houve erro no cadastro
            if (isset($data['imagem']) && Storage::disk('public')->exists($data['imagem'])) {
                Storage::disk('public')->delete($data['imagem']);
            }

            session()->flash('error', '❌ Erro ao cadastrar produto: ' . $e->getMessage());
        }
    }
}