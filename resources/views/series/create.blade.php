@extends('layout')

@section('cabecalho')
    Adicionar Série
@endsection
@section('conteudo')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <form method="POST">
        @csrf
        <div class="form-group">
            <label for="Nome" class=""> Nome da Série</label>
            <input type="text" class="form-control" name="nome">


            <button class="btn btn-primary">
                Adicionar série
            </button>
        </div>
    </form>
@endsection
