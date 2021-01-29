<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Cadastro de Serviço</title>

        

        
    </head>
    <body class="antialiased">
        <h1> Lista de Serviços</h1>

        <a href="/">Página Inicial</a>
       
        <ul>
            @foreach ($lista as $item)
            <li><a href="/editar/servico/{{$item->id}}"> {{$item->guarnicao->prefixo}}  {{$item->cidade->nome}}</a>  <a href="/remover/servico/{{$item->id}}"> X </a> </li>
            @endforeach
        </ul>
        
        <a href="/cadastro/servico"> Cadastrar </a>
    </body>
</html>
