@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3>Editar seu perfil</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('salvar-perfil') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="nome">Nome:</label>
                    <input type="text" class="form-control" name="name" id="name" value="{{ Auth::user()->name }}">
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="text" class="form-control" name="email" id="email" value="{{ Auth::user()->email }}">
                </div>
                <div class="form-group">
                    <label for="password">Senha</label>
                    <input type="password" name="password" class="form-control" id="password">
                </div>
                <div class="form-group">
                    <label for="password_confirmation">Confirmar senha</label>
                    <input type="password" name="password_confirmation" class="form-control" id="password_confirmation">
                </div>
                <div class="float-right">
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
            </form>
        </div>
    </div>
@endsection
