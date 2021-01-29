<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Cadastro de Cidade</title>

        <a href="/">Página Inicial</a>

        
    </head>
    <body class="antialiased">
        <h1> Editar Cidade</h1>
       
        <form method= "POST" action="/editar/cidade">
            
            @csrf<!--previne contra ataques, o laravel exige a tag-->
            
            <input type="hidden" name="id" value="{{$cidade->id}}" /> <br>
            <div>
            Nome: <input type="text" name="nome" value="{{$cidade->nome}}" class="form-control @error('nome')
            is-invalid @enderror"/> <br>
            @error('nome')
            <span>
                <strong>{{$message}}</strong>    
            </span>    
            @enderror
        </div>
         <div>
            Companhia: <input type="text" name="companhia" value="{{$cidade->companhia}}"/> <br>
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
