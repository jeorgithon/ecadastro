<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Editar Militar | Ecadastro</title>
    </head>
    @extends('index')
    @section('content')
    <body class="antialiased">
        <h1> Editar Militar</h1>
       
        <form method= "POST" action="/editarMilitar">
            
            @csrf<!--previne contra ataques, o laravel exige a tag-->

            <input type="hidden" name="id" value="{{$militar->id}}" /> <br>
            Nome Completo: <input type="text" name="nomeCompleto" value="{{$militar->nomeCompleto}}" class="form-control @error('nomeCompleto')
            is-invalid @enderror"/>
            Nome de Guerra: <input type="text" name="nomeGuerra" value="{{$militar->nomeGuerra}}"class="form-control @error('nomeGuerra')
            is-invalid @enderror"/>
            Matricula: <input type="text" name="matricula" value="{{$militar->matricula}}"class="form-control @error('matricula')
            is-invalid @enderror"/>
            Posto/Graduação: <input type="text" name="postoGraduacao" value="{{$militar->postoGraduacao}}"class="form-control @error('postoGraduacao')
            is-invalid @enderror"/>
            OME: <input type="text" name="ome" value="{{$militar->ome}}"class="form-control @error('ome')
            is-invalid @enderror"/>
            Permissão: <input type="text" name="permissao" value="{{$militar->permissao}}"class="form-control @error('permissao')
            is-invalid @enderror"/>
            Email: <input type="text" name="email" value="{{$militar->email}}"class="form-control @error('email')
            is-invalid @enderror"/>

            <br>
            
            <input type="submit" value="Salvar">
        </form>
    </body>
    @endsection
</html>