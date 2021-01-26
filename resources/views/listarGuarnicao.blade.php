<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Cadastro de Militar</title>

        

        
    </head>
    <body class="antialiased">
        <h1> Lista de guarnições</h1>
       
        <ul>
            @foreach ($lista as $item)
            <li><a href="/editar/guarnicao/{{$item->id}}"> {{$item->prefixo}} {{$item->descricao}}</a>  <a href="/remover/guarnicao/{{$item->id}}"> X </a> </li>
            @endforeach
        </ul>
        
        <a href="/cadastro/guarnicao"> Cadastrar </a>
    </body>
</html>
