<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Viaturas | Ecadastro</title>
    </head>
    @extends('index')
    @section('content')
    <body class="antialiased">
        <h1>Viaturas </h1>
       
        <ul>
            @foreach ($lista as $item)
            <div class="input-group mb-3">
                <input type="text" class="form-control" value="{{$item->patrimonio}}  {{$item->placa}}  {{$item->modelo}} {{$item->km}}" aria-label="Recipient's username" aria-describedby="button-addon2" readonly>
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="button" id="button-addon2" onclick="document.location='/editar/viatura/{{$item->id}}'">Editar</button>
                    <button class="btn btn-outline-secondary" type="button" id="button-addon2" onclick="document.location='/remover/viatura/{{$item->id}}'">Excluir</button>
                </div>
            </div>
            @endforeach
        </ul>
        
        <button  onclick="document.location='/cadastro/viatura'"> Cadastrar </button>
    </body>
    @endsection
</html>