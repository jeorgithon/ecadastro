<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Cidades | Ecadastro</title>
        <style>
            .bd-example-row {
                padding-top: 0.75rem;
                padding-bottom: 0.75rem;
                border-bottom: 1px solid;
            }
        </style>
    </head>
    @extends('index')
    @section('content')
    <body class="antialiased">
    <br><br>
    <h1>Cidades</h1>
    <ul>
        @foreach ($lista as $item)
        <div class = "bd-example bd-example-row">
            <div class="container">
                <div class = "row">
                    <div class = "col-6">
                        {{$item->nome}}
                    </div>
                    <div class = "col-2">
                        <button class="btn btn-outline-secondary" type="button" id="button-addon2" onclick="document.location='/editar/cidade/{{$item->id}}'">Editar</button>
                    </div>
                    <div class = "col-2">
                        <button class="btn btn-outline-secondary" type="button" id="button-addon2" onclick="document.location='/remover/cidade/{{$item->id}}'">Excluir</button>
                    </div>
                        
                </div>
            <!--
            <div class="input-group mb-3">
                <input type="text" class="form-control" value="{{$item->nome}}" aria-label="Recipient's username" aria-describedby="button-addon2" readonly>
                <div class="input-group-append">
       
                    <button class="btn btn-outline-secondary" type="button" id="button-addon2" onclick="document.location='/editar/cidade/{{$item->id}}'">Editar</button>
                    <button class="btn btn-outline-secondary" type="button" id="button-addon2" onclick="document.location='/remover/cidade/{{$item->id}}'">Excluir</button>
                </div>-->
            </div>
        </div>
            @endforeach
        </ul>

        <button  onclick="document.location='/cadastro/cidade'"> Cadastrar </button>
    </body>
    @endsection
</html>