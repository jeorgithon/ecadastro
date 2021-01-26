<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Cadastro de Viatura</title>

        
    </head>
    <body class="antialiased">
        <h1> Cadastrar Viatura</h1>
       
        <form method= "POST" action="/cadastro/viatura">
            
            @csrf<!--previne contra ataques, o laravel exige a tag-->
            <div>
            Patrimônio: <input type="text" name="patrimonio" value="{{old('patrimonio')}}" class="form-control @error('patrimonio')
            is-invalid @enderror"/> <br>
            @error('patrimonio')
            <span>
                <strong>{{$message}}</strong>    
            </span>    
            @enderror
        </div>
         <div>
            Tipo: <input type="text" name="tipo" value="{{old('tipo')}}"/> <br>
            @error('tipo')
            <span>
                <strong>{{$message}}</strong>    
            </span>    
            @enderror
        </div>
        <div>
            Marca: <input type="text" name="marca" value="{{old('marca')}}"/> <br>
            @error('matricula')
            <span>
                <strong>{{$message}}</strong>    
            </span>    
            @enderror
        </div>
        <div>
            Modelo: <input type="text" name="modelo" value="{{old('modelo')}}"/> <br>
            @error('modelo')
            <span>
                <strong>{{$message}}</strong>    
            </span>    
            @enderror
        </div>
        <div>
            Placa: <input type="text" name="placa" value="{{old('placa')}}"/> <br>
            @error('placa')
            <span>
                <strong>{{$message}}</strong>    
            </span>    
            @enderror
        </div>  
        <div>
            KM: <input type="text" name="km" value="{{old('km')}}"/> <br>
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
</html>
