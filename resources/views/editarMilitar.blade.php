<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Editar Militar</title>

        

        
    </head>
    <body class="antialiased">
        <h1> Editar Cadastro</h1>

        <a href="/">Página Inicial</a>
       
        <form method= "POST" action="/editarMilitar">
            
            @csrf<!--previne contra ataques, o laravel exige a tag-->

            <input type="hidden" name="id" value="{{$militar->id}}" /> <br>
            Nome Completo: <input type="text" name="nomeCompleto" value="{{$militar->nomeCompleto}}" /> <br>
            Nome de Guerra: <input type="text" name="nomeGuerra" value="{{$militar->nomeGuerra}}"/> <br>
            Matricula: <input type="text" name="matricula" value="{{$militar->matricula}}"/> <br>
            Posto/Graduação: <input type="text" name="postoGraduacao" value="{{$militar->postoGraduacao}}"/> <br>
            OME: <input type="text" name="ome" value="{{$militar->ome}}"/> <br>
            Permissão: <input type="text" name="permissao" value="{{$militar->permissao}}"/> <br>
            Email: <input type="text" name="email" value="{{$militar->email}}"/> <br>
            

            <br>
            

            <input type="submit" value="Salvar">
        </form>
    </body>
</html>
