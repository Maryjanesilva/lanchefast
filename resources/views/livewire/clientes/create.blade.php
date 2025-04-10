<!-- resources/views/livewire/clientes/create.blade.php -->

<style>
    body {
        background: url('/images/bg-kraft-paper.jpg'); /* textura kraft estilo embalagem */
        background-size: cover;
        font-family: 'Comic Sans MS', cursive, sans-serif;
    }

    .card-lanchonete {
        background: linear-gradient(135deg, #fff3cd, #ffecb3);
        border: 3px dashed #ff9800;
        border-radius: 20px;
        box-shadow: 0 8px 15px rgba(0,0,0,0.3);
    }

    .card-header-lanchonete {
        background: #ff5722;
        color: white;
        border-top-left-radius: 20px;
        border-top-right-radius: 20px;
        font-size: 1.5rem;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
    }

    .form-control-lanchonete {
        border: 2px solid #ffb74d;
        border-radius: 15px;
        font-size: 1rem;
    }

    .btn-lanchonete {
        background: #ff9800;
        border: none;
        border-radius: 15px;
        font-size: 1.2rem;
        font-weight: bold;
        transition: 0.3s ease;
    }

    .btn-lanchonete:hover {
        background: #f57c00;
        color: white;
    }

    .emoji-label {
        font-size: 1.2rem;
        margin-right: 5px;
    }
</style>

<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card card-lanchonete">
                <div class="card-header card-header-lanchonete">
                    <i class="fas fa-hamburger"></i> Cadastrar Cliente 🍔🥤
                </div>

                <div class="card-body p-4">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>❌ {{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form wire:submit.prevent="store">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label text-danger"><span class="emoji-label">🧑‍🍳</span>Nome</label>
                            <input type="text" class="form-control form-control-lanchonete" id="name" wire:model="name" placeholder="Digite o nome do cliente" required>
                        </div>

                        <div class="mb-3">
                            <label for="address" class="form-label text-danger"><span class="emoji-label">🏠</span>Endereço</label>
                            <input type="text" class="form-control form-control-lanchonete" id="address" wire:model="address" placeholder="Digite o endereço do cliente" required>
                        </div>

                        <div class="mb-3">
                            <label for="phone" class="form-label text-danger"><span class="emoji-label">📞</span>Telefone</label>
                            <input type="text" class="form-control form-control-lanchonete" id="phone" wire:model="phone" placeholder="Digite o telefone" required>
                        </div>

                        <div class="mb-3">
                            <label for="cpf" class="form-label text-danger"><span class="emoji-label">🪪</span>CPF</label>
                            <input type="text" class="form-control form-control-lanchonete" id="cpf" wire:model="cpf" placeholder="Digite o CPF" required>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label text-danger"><span class="emoji-label">📧</span>E-mail</label>
                            <input type="email" class="form-control form-control-lanchonete" id="email" wire:model="email" placeholder="Digite o e-mail" required>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label text-danger"><span class="emoji-label">🔐</span>Senha</label>
                            <input type="password" class="form-control form-control-lanchonete" id="password" wire:model="password" placeholder="Digite a senha" required>
                        </div>

                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label text-danger"><span class="emoji-label">🔁</span>Confirmar Senha</label>
                            <input type="password" class="form-control form-control-lanchonete" id="password_confirmation" wire:model="password_confirmation" placeholder="Confirme a senha" required>
                        </div>

                        <button type="submit" class="btn btn-lanchonete w-100 mt-3">
                            🍟 Cadastrar Cliente
                        </button>
                    </form>
                </div>
            </div>

            @if (session()->has('message'))
                <div class="alert alert-success mt-3 text-center">
                    🎉 {{ session('message') }}
                </div>
            @endif
        </div>
    </div>
</div>

