@extends('layouts.app')

@section('content')
    <div class="alert alert-danger">
        Erro de conexão: {{ $message }}
    </div>
    <a href="{{ url('/') }}" class="btn btn-primary">Voltar</a>
@endsection