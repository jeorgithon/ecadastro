<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Cadastro de Militar | Ecadastro</title>
    </head>
    @extends('index')
    @section('content')
    <body class="antialiased">
        <h1> Cadastrar Pessoa</h1>
       
        <form method= "POST" action="/cadastroMilitar">
            
            @csrf<!--previne contra ataques, o laravel exige a tag-->
            <div>
                Nome Completo: <input type="text" name="nomeCompleto" value="{{old('nomeCompleto')}}" class="form-control @error('nomeCompleto')
                is-invalid @enderror"/>
                @error('nomeCompleto')
                <span>
                    <strong>{{$message}}</strong>    
                </span>    
                @enderror
            </div>
            <div>
                Nome de Guerra: <input type="text" name="nomeGuerra" value="{{old('nomeGuerra')}}" class="form-control @error('nomeGuerra')
                is-invalid @enderror"/>
                @error('nomeGuerra')
                <span>
                    <strong>{{$message}}</strong>    
                </span>    
                @enderror
            </div>
            <div>
                Matricula: <input type="text" name="matricula" value="{{old('matricula')}}"class="form-control @error('matricula')
                is-invalid @enderror"/>
                @error('matricula')
                <span>
                    <strong>{{$message}}</strong>    
                </span>    
                @enderror
            </div>
            <div>
                Posto/Graduação: <input type="text" name="postoGraduacao" value="{{old('postoGraduacao')}}" class="form-control @error('postoGraduacao')
                is-invalid @enderror"/>
                @error('postoGraduacao')
                <span>
                    <strong>{{$message}}</strong>    
                </span>    
                @enderror
            </div>
            <div>
                OME: <input type="text" name="ome" value="{{old('ome')}}" class="form-control @error('ome')
                is-invalid @enderror"/>
                @error('ome')
                <span>
                    <strong>{{$message}}</strong>    
                </span>    
                @enderror
            </div>  
            <div>
                Permissão: <input type="text" name="permissao" value="{{old('permissao')}}" class="form-control @error('permissao')
                is-invalid @enderror"/>
                @error('permissao')
                <span>
                    <strong>{{$message}}</strong>    
                </span>    
                @enderror
            </div>
            <div>
                Email: <input type="text" name="email" value="{{old('email')}}" class="form-control @error('email')
                is-invalid @enderror"/>
                @error('email')
                <span>
                    <strong>{{$message}}</strong>    
                </span>    
                @enderror
            </div>   
            
            Celular: <input type="text" name="celular" class="form-control @error('celular') is-invalid @enderror"/>
            Telefone Residecial: <input type="text" name="fixo" class="form-control @error('celular') is-invalid @enderror"/> 
            
            <br>
            <input type="submit" value="Salvar">
        </form>
    </body>
    @endsection
</html>