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
        <br><br>
        <h1> Editar Militar</h1>
       
        <form method= "POST" action="/editarMilitar">
            
            @csrf<!--previne contra ataques, o laravel exige a tag-->
            <div>
            <input type="hidden" name="id" value="{{$militar->id}}" /> <br>
            Nome Completo: <input type="text" name="nomeCompleto" value="{{$militar->nomeCompleto}}" class="form-control @error('nomeCompleto')
            is-invalid @enderror"/>
            @error('nomeCompleto')
                <span>
                    <strong>{{$message}}</strong>    
                </span>    
                @enderror
            </div>
            <div>    
            Nome de Guerra: <input type="text" name="nomeGuerra" value="{{$militar->nomeGuerra}}"class="form-control @error('nomeGuerra')
            is-invalid @enderror"/>
            @error('nomeGuerra')
                <span>
                    <strong>{{$message}}</strong>    
                </span>    
                @enderror
            </div> 
            <div>   
            Matricula: <input type="text" name="matricula" value="{{$militar->matricula}}"class="form-control @error('matricula')
            is-invalid @enderror"/>
            @error('matricula')
                <span>
                    <strong>{{$message}}</strong>    
                </span>    
                @enderror
            </div>    
            <div>
                Posto/Graduação:
                    <select class="form-control" id="exampleFormControlSelect2" name="postoGraduacao" value="{{old('postoGraduacao')}}"
                    class="form-control @error('postoGraduacao') is-invalid @enderror">
                    <option>{{$militar->postoGraduacao}}</option>
                    <option>SD</option>
                    <option>CB</option>
                    <option>SGT</option>
                    <option>ST</option>
                    <option>TEN</option>
                    <option>CAP</option>
                    <option>MAJ</option>
                    <option>TEN CEL</option>
                    <option>CEL</option>
                    </select>
                @error('postograduacao')
                <span>
                    <strong>{{$message}}</strong>    
                </span>    
                @enderror
            </div> 
            <div>   
            OME: <input type="text" name="ome" value="{{$militar->ome}}"class="form-control @error('ome')
            is-invalid @enderror"/>
            @error('ome')
                <span>
                    <strong>{{$message}}</strong>    
                </span>    
                @enderror
            </div>    
            <div>
                Permissão:
                    <select class="form-control" id="exampleFormControlSelect1" name="permissao" value="{{$militar->permissao}}"
                    class="form-control @error('permissao') is-invalid @enderror">
                    @if($militar->permissao == 'admin')
                        <option value="{{$militar->permissao}}">admin</option>
                        <option>user</option>
                    @else
                        <option>user</option>
                        <option>admin</option>
                    @endif

                    </select>
                @error('permissao')
                    <span>
                        <strong>{{$message}}</strong>    
                    </span>    
                @enderror
            </div>    

            <div>
            Email: <input type="text" name="email" value="{{$militar->email}}"class="form-control @error('email')
            is-invalid @enderror"/>
            @error('email')
                <span>
                    <strong>{{$message}}</strong>    
                </span>    
            @enderror
            </div> 
            <div>
                @error('contato')
                <span>
                    <strong>{{$message}}</strong>    
                </span>    
            @enderror
            </div>        
            @if (0 < count($militar->contatos))
                <input type="hidden" name="contato1" value="{{$militar->contatos[0]['id']}}" /> 
                Celular: <input type="text" name="celular" value="{{$militar->contatos[0]['contato']}}"
                class="form-control @error('celular') is-invalid @enderror"/>
                @if (2 <= count($militar->contatos))
                    <input type="hidden" name="contato2" value="{{$militar->contatos[1]['id']}}" /> 
                    Telefone Residecial: <input type="text" name="fixo" value="{{$militar->contatos[1]['contato']}}"
                    class="form-control @error('fixo') is-invalid @enderror"/>
                @else
                    Telefone Residecial: <input type="text" name="fixo" class="form-control @error('fixo') is-invalid @enderror"/> 
                      
                @endif
                 
            @else
                Celular: <input type="text" name="celular" class="form-control @error('celular') is-invalid @enderror"/>
                Telefone Residecial: <input type="text" name="fixo" class="form-control @error('fixo') is-invalid @enderror"/>               
            @endif
            
          
            <input type="submit" value="Salvar">
        </form>
    </body>
    @endsection
</html>