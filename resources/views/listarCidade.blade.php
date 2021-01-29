<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Cadastro de Cidade</title>

        

        
    </head>
    <body class="antialiased">
        <h1> Lista de Cidade</h1>

        <a href="/">Página Inicial</a>
       
        <ul>
            @foreach ($lista as $item)
            <li><a href="/editar/cidade/{{$item->id}}"> {{$item->nome}}  {{$item->companhia}}</a>  <a href="/remover/cidade/{{$item->id}}"> X </a> </li>
            @endforeach
        </ul>
        
        <a href="/cadastro/cidade"> Cadastrar </a>
    </body>
</html>
