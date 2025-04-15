<?php

namespace App\Livewire\Clientes;

use App\Models\Cliente;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Illuminate\Support\Str;

class Create extends Component
{
    public $nome;
    public $endereco;
    public $telefone;
    public $cpf;
    public $email;
    public $senha;
    public $senha_confirmation;

    protected $rules = [
        'nome' => 'required|min:3|max:100',
        'endereco' => 'required|min:5|max:200',
        'telefone' => 'nullable|string|max:20',
        'cpf' => 'required|string|max:14|unique:clientes,cpf',
        'email' => 'required|email|unique:clientes,email',
        'senha' => 'required|min:6|confirmed',
    ];

    protected $messages = [
        'nome.required' => 'O nome completo é obrigatório.',
        'email.unique' => 'Este e-mail já está cadastrado.',
        'cpf.unique' => 'Este CPF já está em uso.',
        'senha.confirmed' => 'As senhas não coincidem.',
        '*.min' => 'Este campo precisa ter pelo menos :min caracteres.',
        '*.max' => 'Este campo não pode ter mais que :max caracteres.',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function store()
    {
        $this->validate();

        try {
            $cliente = Cliente::create([
                'nome' => Str::title($this->nome),
                'endereco' => $this->endereco,
                'telefone' => $this->telefone,
                'cpf' => $this->cpf,
                'email' => Str::lower($this->email),
                'senha' => Hash::make($this->senha),
            ]);

            $this->reset();
            session()->flash('success', 'Cliente cadastrado com sucesso!');
            
            // Opcional: Disparar evento ou redirecionar
            // $this->dispatch('cliente-criado', $cliente->id);
            
        } catch (\Exception $e) {
            session()->flash('error', 'Erro ao cadastrar: ' . $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.clientes.create')
            ->layout('components.layouts.app');
    }
}