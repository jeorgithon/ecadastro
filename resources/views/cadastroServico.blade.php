<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Cadastro de Serviço</title>

        
    </head>
    <body class="antialiased">
        <h1> Cadastrar Serviço</h1>
       
        <form method= "POST" action="/cadastro/servico">
            
            @csrf<!--previne contra ataques, o laravel exige a tag-->
            <div>
            Data de início: <input type="date" name="dataInicial" value="{{old('dataInicial')}}" class="form-control @error('dataInicial')
            is-invalid @enderror"/> <br>
            @error('dataInicial')
                <span>
                    <strong>{{$message}}</strong>    
                </span>    
            @enderror
             </div>
             
            <div>
            Data de termino: <input type="date" name="dataFinal" value="{{old('dataFinal')}}" class="form-control @error('dataFinal')
            is-invalid @enderror"/> <br>
            @error('dataFinal')
                <span>
                    <strong>{{$message}}</strong>    
                </span>    
            @enderror
             </div>
             <div>
                Hora de início: <input type="time" name="horaInicial" value="{{old('horaInicial')}}" class="form-control @error('horaInicial')
                is-invalid @enderror"/> <br>
                @error('horaInicial')
                    <span>
                        <strong>{{$message}}</strong>    
                    </span>    
                @enderror
                 </div>
             <div>
                Hora de termino: <input type="time" name="horaFinal" value="{{old('horaFinal')}}" class="form-control @error('horaFinal')
                is-invalid @enderror"/> <br>
                @error('horaFinal')
                    <span>
                        <strong>{{$message}}</strong>    
                    </span>    
                @enderror
            </div>
         
         
            <input type="submit" value="Salvar">
        </form>
    </body>
</html>
