<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Cadastro de Serviço | Ecadastro</title>
    </head>
    @extends('index')
    @section('content')
    <body class="antialiased">
        <h1> Cadastrar Serviço</h1>
       
        <form method= "POST" action="/cadastro/servico">
            
            @csrf<!--previne contra ataques, o laravel exige a tag-->
        
            <div>
                Data de início: <input type="datetime-local" min="{{$min}}"  max="{{$max}}" name="dataHoraInicial" 
                value="{{old('dataHoraInicial')}}" class="form-control @error('dataHoraInicial')
                is-invalid @enderror"/>
                @error('dataHoraInicial')
                    <span>
                        <strong>{{$message}}</strong>    
                    </span>    
                @enderror
            </div>

            <div>
                Data de termino: <input type="datetime-local" name="dataHoraFinal" value="{{old('dataHoraFinal')}}" 
                class="form-control @error('dataHoraFinal')
                is-invalid @enderror"/>
                @error('dataHoraFinal')
                    <span>
                        <strong>{{$message}}</strong>    
                    </span>    
                @enderror
            </div>
            <br>
            
            <div>
               Guarnição: <select name="guarnicao_id" autofocus >
                    <option>Escolha uma Guarnição</option>
                    
                    @foreach($guarnicoes as $g)
                        @if('guarnicao_id' == $g->id)
                            <option value="{{$g->id}}" selected="selected">{{$g->prefixo}} - {{$g->descricao}}</option>
                        @else
                            <option value="{{$g->id}}">{{$g->prefixo}} - {{$g->descricao}}</option>
                        @endif
                    @endforeach
                </select>
                <br>
                 @error('guarnicao_id')
                <span>
                    <strong>{{$message}}</strong>    
                </span>    
                @enderror
            </div>
            <br>
            <div>
                Cidade: <select name="cidade_id" autofocus >
                     <option>Escolha uma Cidade</option>
                     
                     @foreach($cidades as $c)
                         @if('cidade_id' == $c->id)
                             <option value="{{$c->id}}" selected="selected">{{$c->nome}}</option>
                         @else
                             <option value="{{$c->id}}">{{$c->nome}}</option>
                         @endif
                     @endforeach
                 </select>
                 <br>
                 @error('cidade_id')
                <span>
                    <strong>{{$message}}</strong>    
                </span>    
                @enderror
            </div>
            <br>
            <div>
                Observações: <textarea cols="40" rows="5" maxlength="200" name="observacao" class="form-control @error('observacao')
                is-invalid @enderror">{{old('observacao')}}</textarea> <br>
             </div>
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