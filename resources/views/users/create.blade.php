@extends('layouts.app')

@section('content')
<div class="mb-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h2"><i class="fas fa-user-plus me-2"></i>Cadastrar Novo Usuário</h1>
        <a href="{{ route('users.index') }}" class="btn btn-outline-light">
            <i class="fas fa-arrow-left me-2"></i>Voltar
        </a>
    </div>

    <div class="card glass-effect">
        <div class="card-body">
            <form method="POST" action="{{ route('users.store') }}">
                @csrf

                <div class="row g-3">
                    <!-- Dados Pessoais -->
                    <div class="col-md-6">
                        <div class="card mb-4">
                            <div class="card-header">
                                <h5 class="mb-0"><i class="fas fa-id-card me-2"></i>Dados Pessoais</h5>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label class="form-label">Nome completo *</label>
                                    <input type="text" 
                                           class="form-control" 
                                           name="nome" 
                                           required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Data de Nascimento</label>
                                    <input type="date" 
                                           class="form-control" 
                                           name="dataNascimento">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">CPF *</label>
                                    <input type="text" 
                                           class="form-control" 
                                           name="cpf" 
                                           required 
                                           maxlength="11"
                                           pattern="\d{11}">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Contato -->
                    <div class="col-md-6">
                        <div class="card mb-4">
                            <div class="card-header">
                                <h5 class="mb-0"><i class="fas fa-phone-alt me-2"></i>Contato</h5>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label class="form-label">Email *</label>
                                    <input type="email" 
                                           class="form-control" 
                                           name="email" 
                                           required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Telefone</label>
                                    <input type="text" 
                                           class="form-control" 
                                           name="fone"
                                           pattern="\(?\d{2}\)?\s?\d{4,5}-?\d{4}">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Endereço -->
                    <div class="col-12">
                        <div class="card mb-4">
                            <div class="card-header">
                                <h5 class="mb-0"><i class="fas fa-map-marker-alt me-2"></i>Endereço</h5>
                            </div>
                            <div class="card-body">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label">Rua</label>
                                        <input type="text" class="form-control" name="rua">
                                    </div>
                                    <div class="col-md-2">
                                        <label class="form-label">Número</label>
                                        <input type="text" class="form-control" name="numero">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Bairro</label>
                                        <input type="text" class="form-control" name="bairro">
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-label">CEP</label>
                                        <input type="text" 
                                               class="form-control" 
                                               name="cep"
                                               pattern="\d{5}-?\d{3}">
                                    </div>
                                    <div class="col-md-5">
                                        <label class="form-label">Cidade</label>
                                        <input type="text" class="form-control" name="cidade">
                                    </div>
                                    <div class="col-md-4">
    <label class="form-label">Estado</label>
    <select class="form-select" name="estado" id="estado" required>
        <option value="">Selecione...</option>
        @foreach([
            'AC'=>'Acre',
            'AL'=>'Alagoas',
            'AP'=>'Amapá',
            'AM'=>'Amazonas',
            'BA'=>'Bahia',
            'CE'=>'Ceará',
            'DF'=>'Distrito Federal',
            'ES'=>'Espírito Santo',
            'GO'=>'Goiás',
            'MA'=>'Maranhão',
            'MT'=>'Mato Grosso',
            'MS'=>'Mato Grosso do Sul',
            'MG'=>'Minas Gerais',
            'PA'=>'Pará',
            'PB'=>'Paraíba',
            'PR'=>'Paraná',
            'PE'=>'Pernambuco',
            'PI'=>'Piauí',
            'RJ'=>'Rio de Janeiro',
            'RN'=>'Rio Grande do Norte',
            'RS'=>'Rio Grande do Sul',
            'RO'=>'Rondônia',
            'RR'=>'Roraima',
            'SC'=>'Santa Catarina',
            'SP'=>'São Paulo',
            'SE'=>'Sergipe',
            'TO'=>'Tocantins'
        ] as $uf => $estado)
            <option value="{{ $uf }}" {{ old('estado', $endereco['estado'] ?? '') == $uf ? 'selected' : '' }}>
                {{ $estado }}
            </option>
        @endforeach
    </select>
</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="d-flex gap-3 justify-content-end">
                            <button type="submit" class="btn btn-primary px-4 py-2">
                                <i class="fas fa-save me-2"></i>Salvar
                            </button>
                            <a href="{{ route('users.index') }}" class="btn btn-outline-light px-4 py-2">
                                <i class="fas fa-times me-2"></i>Cancelar
                            </a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection