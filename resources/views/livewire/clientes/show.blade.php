@extends('layouts.app')

@section('content')
<div class="container py-5" style="background-color: #fff8ec;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-warning text-white text-center">
                    <h4 class="mb-0">
                        <i class="bi bi-person-lines-fill me-2"></i> Detalhes do Cliente 🍔
                    </h4>
                </div>

                <div class="card-body" style="background-color: #fffdf8;">
                    <div class="row mb-4">
                        <div class="col-md-4 text-center">
                            <div class="bg-amber-100 rounded-circle p-4 d-inline-block">
                                <i class="bi bi-person-fill text-amber-600" style="font-size: 3rem;"></i>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <h3 class="text-dark">{{ $cliente->nome }}</h3>
                            <p class="text-muted mb-1">
                                <i class="bi bi-envelope-fill me-2"></i> {{ $cliente->email }}
                            </p>
                            <p class="text-muted mb-1">
                                <i class="bi bi-file-earmark-text-fill me-2"></i> {{ $cliente->cpf }}
                            </p>
                            @if($cliente->telefone)
                            <p class="text-muted mb-1">
                                <i class="bi bi-telephone-fill me-2"></i> {{ $cliente->telefone }}
                            </p>
                            @endif
                        </div>
                    </div>

                    <div class="border-top pt-3">
                        <h5 class="text-dark mb-3">
                            <i class="bi bi-house-door-fill me-2"></i> Endereço
                        </h5>
                        <p class="text-muted">{{ $cliente->endereco }}</p>
                    </div>

                    <div class="border-top pt-3">
                        <h5 class="text-dark mb-3">
                            <i class="bi bi-clock-history me-2"></i> Informações Adicionais
                        </h5>
                        <div class="row">
                            <div class="col-md-6">
                                <p class="text-muted mb-1">
                                    <i class="bi bi-calendar-check me-2"></i> 
                                    Cadastrado em: {{ $cliente->created_at->format('d/m/Y') }}
                                </p>
                            </div>
                            <div class="col-md-6">
                                <p class="text-muted mb-1">
                                    <i class="bi bi-arrow-repeat me-2"></i> 
                                    Última atualização: {{ $cliente->updated_at->format('d/m/Y') }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-footer bg-light">
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('clientes.index') }}" class="btn btn-outline-secondary">
                            <i class="bi bi-arrow-left me-1"></i> Voltar
                        </a>
                        <div class="btn-group">
                            <a href="{{ route('clientes.edit', $cliente->id) }}" 
                               class="btn btn-outline-primary">
                                <i class="bi bi-pencil-square me-1"></i> Editar
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection