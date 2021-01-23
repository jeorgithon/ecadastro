<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Cadastro de Militar</title>

        

        
    </head>
    <body class="antialiased">
        <h1> Cadastrar Pessoa</h1>
       
        <form method= "POST" action="/cadastroMilitar">
            
            @csrf<!--previne contra ataques, o laravel exige a tag-->

            Nome Completo: <input type="text" name="nomeCompleto" /> <br>
            Nome de Guerra: <input type="text" name="nomeGuerra" /> <br>
            Matricula: <input type="text" name="matricula" /> <br>
            Posto/Graduação: <input type="text" name="postoGraduacao" /> <br>
            OME: <input type="text" name="ome" /> <br>
            Permissão: <input type="text" name="permissao" /> <br>
            Usuário: <input type="text" name="usuario" /> <br>
            Senha: <input type="text" name="senha" /> <br>
            <br>
          <!--  Celular: <input type="text" name="celular" /> <br>
            Telefone Residecial: <input type="text" name="fixo" /> <br> -->

            <input type="submit" value="CadastroMilitar">
        </form>
    </body>
</html>
