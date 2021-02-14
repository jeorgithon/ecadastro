<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Cadastro de Viatura</title>

        
    </head>
    <body class="antialiased">
        <h1> Cadastrar Viatura</h1>

        <a href="/index">Página Inicial</a>
       
        <form method= "POST" action="/cadastro/guarnicao">
            
            @csrf<!--previne contra ataques, o laravel exige a tag-->
            <div>
            Prefixo: <input type="text" name="prefixo" value="{{old('prefixo')}}" class="form-control @error('prefixo')
            is-invalid @enderror"/> <br>
            @error('prefixo')
            <span>
                <strong>{{$message}}</strong>    
            </span>    
            @enderror
        </div>
         <div>
            Descrição: <input type="text" name="descricao" value="{{old('descricao')}}"/> <br>
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
</html>
