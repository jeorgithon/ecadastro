<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Cadastro de Cidade</title>

        
    </head>
    <body class="antialiased">
        <h1> Cadastrar Cidade</h1>

        <a href="/">Página Inicial</a>
       
        <form method= "POST" action="/cadastro/cidade">
            
            @csrf<!--previne contra ataques, o laravel exige a tag-->
            <div>
            Nome: <input type="text" name="nome" value="{{old('nome')}}" class="form-control @error('nome')
            is-invalid @enderror"/> <br>
            @error('nome')
            <span>
                <strong>{{$message}}</strong>    
            </span>    
            @enderror
        </div>
         <div>
            Companhia: <input type="text" name="companhia" value="{{old('companhia')}}"/> <br>
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
</html>
