<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Cadastro de Militar</title>

        <div>
            
            @error('nomeGuerra')
            <span>
                <strong>{{$message}}</strong>    
            </span>    
            @enderror
        </div>

        
    </head>
    <body class="antialiased">
        <h1> Cadastrar Pessoa</h1>
       
        <form method= "POST" action="/cadastroMilitar">
            
            @csrf<!--previne contra ataques, o laravel exige a tag-->
            <div>
            Nome Completo: <input type="text" name="nomeCompleto" value="{{old('nomeCompleto')}}" class="form-control @error('nomeCompleto')
            is-invalid @enderror"/> <br>
            @error('nomeCompleto')
            <span>
                <strong>{{$message}}</strong>    
            </span>    
            @enderror
        </div>
         <div>
            Nome de Guerra: <input type="text" name="nomeGuerra" value="{{old('nomeGuerra')}}"/> <br>
            @error('nomeGuerra')
            <span>
                <strong>{{$message}}</strong>    
            </span>    
            @enderror
        </div>
        <div>
            Matricula: <input type="text" name="matricula" value="{{old('matricula')}}"/> <br>
            @error('matricula')
            <span>
                <strong>{{$message}}</strong>    
            </span>    
            @enderror
        </div>
        <div>
            Posto/Graduação: <input type="text" name="postoGraduacao" value="{{old('postoGraduacao')}}"/> <br>
            @error('postoGraduacao')
            <span>
                <strong>{{$message}}</strong>    
            </span>    
            @enderror
        </div>
        <div>
            OME: <input type="text" name="ome" value="{{old('ome')}}"/> <br>
            @error('ome')
            <span>
                <strong>{{$message}}</strong>    
            </span>    
            @enderror
        </div>  
        <div>
            Permissão: <input type="text" name="permissao" value="{{old('permissao')}}"/> <br>
            @error('permissao')
            <span>
                <strong>{{$message}}</strong>    
            </span>    
            @enderror
        </div>
        <div>
            Usuário: <input type="text" name="usuario" value="{{old('usuario')}}"/> <br>
            @error('usuario')
            <span>
                <strong>{{$message}}</strong>    
            </span>    
            @enderror
        </div>   
        <div>
            Senha: <input type="text" name="senha" /> <br>
            @error('senha')
            <span>
                <strong>{{$message}}</strong>    
            </span>    
            @enderror
        </div>   
            
            
            <br>
          <!--  Celular: <input type="text" name="celular" /> <br>
            Telefone Residecial: <input type="text" name="fixo" /> <br> -->

            <input type="submit" value="Salvar">
        </form>
    </body>
</html>
