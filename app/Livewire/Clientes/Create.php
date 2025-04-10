<?php

namespace App\Livewire\Clientes;

use App\Models\Cliente;
use Livewire\Component;

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
        'nome' => 'required|string|max:255',
        'endereco' => 'required|string|max:255',
        'telefone' => 'nullable|string|max:15',
        'cpf' => ['required', 'string', 'cpf'],  // Usando a nova validação do CPF
        'email' => 'required|email|unique:clientes,email',
        'senha' => 'required|string|min:8|confirmed',
    ];

    public function render()
    {
        return view('livewire.clientes.create');
    }

    public function store()
    {
        // Validar os dados
        $this->validate();

        // Criar cliente
        Cliente::create([
            'nome' => $this->nome,
            'endereco' => $this->endereco,
            'telefone' => $this->telefone,
            'cpf' => $this->cpf,
            'email' => $this->email,
            'senha' => bcrypt($this->senha),
        ]);

        // Mostrar mensagem de sucesso
        session()->flash('message', 'Cliente criado com sucesso!');
        
        // Redirecionar para a página de clientes
        return redirect()->route('clientes.index');
    }

    /**
     * Validação personalizada para CPF
     */
    public function rules()
    {
        return [
            'cpf' => 'required|cpf',
        ];
    }
}
