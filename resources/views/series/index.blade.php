@extends('layout')
@section('cabecalho')
    Séries
@endsection
@section('conteudo')
    @if (isset($mensagem))
        <div class="alert alert-success">
            {{ $mensagem }}
        </div>
    @endif
    <a href="/series/criar" class="btn btn-dark mb-2 mt-2"> Adicionar </a>
    <ul class="list-group">
        @foreach ($series as $serie)
            <li class="list-group-item d-flex justify-content-between align-items-center"> {{ $serie->nome }}
                <form method="POST" action="/series/{{ $serie->id }}" onsubmit="return confirm('Tem certeza?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm" >Excluir</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection
