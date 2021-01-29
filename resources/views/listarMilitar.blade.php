<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Cadastro de Militar</title>

        

        
    </head>
    <body class="antialiased">
        <h1> Lista Militar</h1>

        <a href="/">Página Inicial</a>
       
        <ul>
            @foreach ($lista as $item)
            <li><a href="/editarMilitar/{{$item->id}}"> {{$item->postoGraduacao}}  {{$item->matricula}}  {{$item->nomeGuerra}}</a>  <a href="/removerMilitar/{{$item->id}}"> X </a> </li>
            @endforeach
        </ul>
        
        <a href="/cadastroMilitar"> Cadastrar </a>
    </body>
</html>
