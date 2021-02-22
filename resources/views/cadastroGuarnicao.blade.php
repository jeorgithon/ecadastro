<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Cadastro de Guarnição | Ecadastro</title>
    </head>
    @extends('index')
    @section('content')
    <body class="antialiased">
        <br><br>
        <h1> Cadastrar Guarnição</h1>
       
        <form method= "POST" action="/cadastro/guarnicao">
            
            @csrf<!--previne contra ataques, o laravel exige a tag-->
            <div>
            Prefixo: <input type="text" name="prefixo" value="{{old('prefixo')}}" class="form-control @error('prefixo')
            is-invalid @enderror"/>
            @error('prefixo')
            <span>
                <strong>{{$message}}</strong>    
            </span>    
            @enderror
        </div>
         <div>
            Descrição: <input type="text" name="descricao" value="{{old('descricao')}}"class="form-control @error('descricao')
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