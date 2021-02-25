<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Cadastro de Serviço | Ecadastro</title>
    </head>
    @extends('index')
    @section('content')
    <body class="antialiased">
        <br><br>
        <h1> Selecione um intervalo para listar os serviços</h1>
       
       

        <form method= "POST" action="/listar/servicos">
            
            @csrf<!--previne contra ataques, o laravel exige a tag-->
        
            <div>
                Data de início: <input type="datetime-local"  name="dataHoraInicial" 
                value="{{old('dataHoraInicial')}}" class="form-control @error('dataHoraInicial')
                is-invalid @enderror"/>
                @error('dataHoraInicial')
                    <span>
                        <strong>{{$message}}</strong>    
                    </span>    
                @enderror
            </div>

            <div>
                Data de termino: <input type="datetime-local" name="dataHoraFinal" value="{{old('dataHoraFinal')}}" 
                class="form-control @error('dataHoraFinal')
                is-invalid @enderror"/>
                @error('dataHoraFinal')
                    <span>
                        <strong>{{$message}}</strong>    
                    </span>    
                @enderror
            </div>
            <br>
            <input type="submit" value="Buscar">
        </form>
    </body>
    @endsection
</html>