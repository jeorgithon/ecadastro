<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Editar Cidade | Ecadastro</title>
    </head>
    @extends('index')
    @section('content')
    <body class="antialiased">
        <br><br>
        <h1> Editar Cidade</h1>
       
        <form method= "POST" action="/editar/cidade">
            
            @csrf<!--previne contra ataques, o laravel exige a tag-->
            
            <input type="hidden" name="id" value="{{$cidade->id}}" /> <br>
            <div>
            Nome: <input type="text" name="nome" value="{{$cidade->nome}}" class="form-control @error('nome')
            is-invalid @enderror"/>
            @error('nome')
            <span>
                <strong>{{$message}}</strong>    
            </span>    
            @enderror
        </div>
         <div>
            Companhia: <input type="text" name="companhia" value="{{$cidade->companhia}}" class="form-control @error('nome')
            is-invalid @enderror"/>
            @error('companhia')
            <span>
                <strong>{{$message}}</strong>    
            </span>    
            @enderror
        </div>
        <br>
         
            <input type="submit" value="Salvar">
        </form>
    </body>
    @endsection
</html>