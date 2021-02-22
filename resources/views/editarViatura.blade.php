<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Editar Viatura | Ecadastro</title>
    </head>
    @extends('index')
    @section('content')
    <body class="antialiased">
        <br><br>
        <h1> Editar Viatura</h1>
       
        <form method= "POST" action="/editar/viatura">
            
            @csrf<!--previne contra ataques, o laravel exige a tag-->
            
            <input type="hidden" name="id" value="{{$viatura->id}}" /> <br>
            <div>
            Patrimônio: <input type="text" name="patrimonio" value="{{$viatura->patrimonio}}" class="form-control @error('patrimonio')
            is-invalid @enderror"/>
            @error('patrimonio')
            <span>
                <strong>{{$message}}</strong>    
            </span>    
            @enderror
        </div>
         <div>
            <div>
                Tipo:
                <select class="form-control" id="exampleFormControlSelect1" name="tipo" value="{{$viatura->tipo}}" 
                class="form-control @error('tipo') is-invalid @enderror">
                <option>{{$viatura->tipo}}</option>
                <option>carro</option>
                <option>moto</option>
                </select>
            </div>
            @error('nomeGuerra')
            <span>
                <strong>{{$message}}</strong>    
            </span>    
            @enderror
        </div>
        <div>
            Marca: <input type="text" name="marca" value="{{$viatura->marca}}" class="form-control @error('marca')
            is-invalid @enderror"/>
            @error('matricula')
            <span>
                <strong>{{$message}}</strong>    
            </span>    
            @enderror
        </div>
        <div>
            Modelo: <input type="text" name="modelo" value="{{$viatura->modelo}}" class="form-control @error('modelo')
            is-invalid @enderror"/>
            @error('modelo')
            <span>
                <strong>{{$message}}</strong>    
            </span>    
            @enderror
        </div>
        <div>
            Placa: <input type="text" name="placa" value="{{$viatura->placa}}" class="form-control @error('placa')
            is-invalid @enderror"/>
            @error('placa')
            <span>
                <strong>{{$message}}</strong>    
            </span>    
            @enderror
        </div>  
        <div>
            KM: <input type="text" name="km" value="{{$viatura->km}}" class="form-control @error('km    ')
            is-invalid @enderror"/>
            @error('km')
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