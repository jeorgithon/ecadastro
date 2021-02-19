<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Editar Serviço | Ecadastro</title>
    </head>
    @extends('index')
    @section('content')
    <body class="antialiased">
        <h1> Editar Serviço</h1>
       
        <form method= "POST" action="/editar/servico">
            
            @csrf<!--previne contra ataques, o laravel exige a tag-->
            
            <input type="hidden" name="id" value="{{$servico->id}}" /> <br>
            <div>
                Data de início: <input type="datetime-local" name="dataHoraInicial" value="{{$inicio}}" class="form-control @error('dataInicial')
                is-invalid @enderror"/> <br>
                @error('dataInicial')
                    <span>
                        <strong>{{$message}}</strong>    
                    </span>    
                @enderror
                 </div>
                 
                <div>
                Data de termino: <input type="datetime-local" name="dataHoraFinal" value="{{$fim}}"  class="form-control @error('dataHoraFinal')
                is-invalid @enderror"/> <br>
                @error('dataHoraFinal')
                    <span>
                        <strong>{{$message}}</strong>    
                    </span>    
                @enderror
                 </div> 
                <div>
                   Guarnição <select name="guarnicao_id" autofocus>
                        <option>Escolha uma Guarnição</option>
                        
                        @foreach($guarnicoes as $g)
                            @if($g->id == $servico->guarnicao->id)
                                <option value="{{$servico->guarnicao->id}}" selected="selected">{{$servico->guarnicao->prefixo}}</option>
                                
                            @else
                                <<option value="{{$g->id}}" >{{$g->prefixo}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <br>
                <div>
                    Cidade <select name="cidade_id" autofocus>
                         <option>Escolha uma Cidade</option>
                         
                         @foreach($cidades as $c)
                             @if($servico->cidade->id == $c->id)
                                 <option value="{{$c->id}}" selected="selected">{{$c->nome}}</option>
                             @else
                                 <option value="{{$c->id}}">{{$c->nome}}</option>
                             @endif
                         @endforeach
                     </select>
                 </div>
                 <br>
                 <div>
                    Observações: <textarea cols="40" rows="5" maxlength="200" name="observacao"  class="form-control @error('observacao')
                    is-invalid @enderror">{{$servico->observacao}}</textarea> <br>
                 </div>
                 <br>
                 <hr>
             <h3>Lista de Militares</h3>

             <ul>
                @foreach (Session::get('registro') as $r => $item )
                
                    @if ($item != null)
                        <li>{{ $item['postoGraduacao']}}  {{ $item['matricula']}}  {{ $item['nomeGuerra']}}
                        Viatura {{$item['patrimonio']}} <a href="/remover/registro/{{$r}}">Remover</a></li>
                    @endif
                @endforeach
             </ul>
             <br>
            <a href="/cadastro/servico/registro">Adicionar Registro</a>
             <br>
             <br>
         
            <input type="submit" value="Salvar">
        </form>
    </body>
    @endsection
</html>