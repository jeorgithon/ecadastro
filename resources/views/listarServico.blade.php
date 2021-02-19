<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Serviços | Ecadastro</title>
    </head>
    @extends('index')
    @section('content')
    <body class="antialiased">
        <h1> Serviços</h1>
       
        <ul>
            @foreach ($lista as $item)
            <div class="input-group mb-3">
                <input type="text" class="form-control" value="{{$item->guarnicao->prefixo}}  {{$item->cidade->nome}}" 
                aria-label="Recipient's username" aria-describedby="button-addon2" readonly>
                <div class="input-group-append">
                   
                    <button class="btn btn-outline-secondary" type="button" id="button-addon2"
                     onclick="document.location='/editar/servico/{{$item->id}}'">Editar</button>
                   
                    <button class="btn btn-outline-secondary" type="button" id="button-addon2"
                     onclick="document.location='/remover/servico/{{$item->id}}'">Excluir</button>
                </div>
            </div>
            @endforeach
        </ul>

        
    
        <button  onclick="document.location='/cadastro/servico'"> Cadastrar </button>
    </body>
    @endsection
</html>