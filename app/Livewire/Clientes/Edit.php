<?php

namespace App\Livewire\Clientes;

use App\Models\Cliente;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Illuminate\Support\Str;

class Edit extends Component
{
    public Cliente $cliente;
    public $senha;
    public $senha_confirmation;

    protected $rules = [
        'cliente.nome' => 'required|min:3|max:100',
        'cliente.endereco' => 'required|min:5|max:200',
        'cliente.telefone' => 'nullable|string|max:20',
        'cliente.cpf' => 'required|string|max:14|unique:clientes,cpf,{{$cliente->id}}',
        'cliente.email' => 'required|email|unique:clientes,email,{{$cliente->id}}',
        'senha' => 'nullable|min:6|confirmed',
    ];

    protected $messages = [
        'cliente.nome.required' => 'O nome completo é obrigatório.',
        'cliente.email.unique' => 'Este e-mail já está cadastrado.',
        'cliente.cpf.unique' => 'Este CPF já está em uso.',
        'senha.confirmed' => 'As senhas não coincidem.',
        '*.min' => 'Este campo precisa ter pelo menos :min caracteres.',
        '*.max' => 'Este campo não pode ter mais que :max caracteres.',
    ];

    public function mount(Cliente $cliente)
    {
        $this->cliente = $cliente;
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function update()
    {
        $this->validate();

        try {
            // Atualiza a senha apenas se foi fornecida
            if ($this->senha) {
                $this->cliente->senha = Hash::make($this->senha);
            }

            $this->cliente->save();

            session()->flash('success', 'Dados do cliente atualizados com sucesso!');
            
        } catch (\Exception $e) {
            session()->flash('error', 'Erro ao atualizar: ' . $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.clientes.edit')
            ->layout('components.layouts.app');
    }
}