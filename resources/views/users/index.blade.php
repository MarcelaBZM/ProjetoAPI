@extends('layouts.app')

@section('content')
<div class="mb-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h2"><i class="fas fa-users-cog me-2"></i>Gestão de Usuários</h1>
        <a href="{{ route('users.create') }}" class="btn btn-primary">
            <i class="fas fa-plus-circle me-2"></i>Novo Usuário
        </a>
    </div>

    @include('partials.alerts')

    <div class="card glass-effect">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="card-header">
                        <tr>
                            <th><i class="fas fa-user me-1"></i>Nome</th>
                            <th><i class="fas fa-envelope me-1"></i>E-mail</th>
                            <th><i class="fas fa-id-card me-1"></i>CPF</th>
                            <th class="text-center"><i class="fas fa-tools me-1"></i>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($users as $user)
                            <tr class="hover-effect">
                                <td>{{ $user['nome'] }}</td>
                                <td>{{ $user['email'] }}</td>
                                <td>{{ $user['cpf'] }}</td>
                                <td class="text-center">
                                    <div class="d-flex gap-2 justify-content-center">
                                        @if(isset($user['id']))
                                            <a href="{{ route('users.edit', $user['id']) }}" 
                                               class="btn btn-sm btn-outline-light">
                                               <i class="fas fa-edit me-1"></i>Editar
                                            </a>
                                            
                                            <form action="{{ route('users.destroy', $user['id']) }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="button" 
            class="btn btn-sm btn-outline-danger" 
            data-delete>
        <i class="fas fa-trash-alt me-1"></i>Excluir
    </button>
</form>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center text-muted py-4">
                                    <i class="fas fa-users-slash fa-2x mb-3"></i><br>
                                    Nenhum usuário cadastrado
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection