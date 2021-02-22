<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Editar Guarnição | Ecadastro</title>
    </head>
    @extends('index')
    @section('content')
    <body class="antialiased">
        <br><br>
        <h1> Editar Guarnição</h1>
       
        <form method= "POST" action="/editar/guarnicao">
            
            @csrf<!--previne contra ataques, o laravel exige a tag-->
            
            <input type="hidden" name="id" value="{{$guarnicao->id}}" /> <br>
            <div>
            Prefixo: <input type="text" name="prefixo" value="{{$guarnicao->prefixo}}" class="form-control @error('prefixo')
            is-invalid @enderror"/>
            @error('prefixo')
            <span>
                <strong>{{$message}}</strong>    
            </span>    
            @enderror
        </div>
         <div>
            Descrição: <input type="text" name="descricao" value="{{$guarnicao->descricao}}" class="form-control @error('prefixo')
            is-invalid @enderror"/>
            @error('descricao')
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