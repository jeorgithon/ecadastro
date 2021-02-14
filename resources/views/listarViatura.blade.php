<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Cadastro de Militar</title>

        

        
    </head>
    <body class="antialiased">
        <h1> Lista de viatura</h1>

        <a href="/index">Página Inicial</a>
       
        <ul>
            @foreach ($lista as $item)
            <li><a href="/editar/viatura/{{$item->id}}"> {{$item->patrimonio}}  {{$item->placa}}  {{$item->modelo}} {{$item->km}}</a>  <a href="/remover/viatura/{{$item->id}}"> X </a> </li>
            @endforeach
        </ul>
        
        <a href="/cadastro/viatura"> Cadastrar </a>
    </body>
</html>
