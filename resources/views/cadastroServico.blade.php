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
        <br><br>
        <h1> Cadastrar Serviço</h1>
       
        {{-- <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary"  data-toggle="modal" data-target="#addRegistro" data-bs-whatever="@teste">
        Registrar Militar
        </button>

        <!-- Modal -->
        <div class="modal fade" id="addRegistro" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Registrar Militar</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form>
                <div class="form-group">
                    <label for="exampleInputEmail1" class="form-label">Militar</label>
                    <input type="text" class="form-control" id="registroMilitar">
                </div>
                <div class="form-group">
                    <label for="exampleInputFuncao" class="form-label">Função</label>
                    <div class="form-check">
                        <input class="form-label" type="checkbox" value="" id="flexCheckDefaultComandante">
                        <label class="form-check-label" for="flexCheckDefault">
                            Comandante
                        </label>
                        </div>
                        <div class="form-check">
                        <input class="form-label" type="checkbox" value="" id="flexCheckDefaultMotorista">
                        <label class="form-check-label" for="flexCheckDefault">
                            Motorista
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1" class="form-label">Viatura</label>
                    <input type="text" class="form-control" id="viaturaMilitar">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1" class="form-label">KM</label>
                    <input type="number" class="form-control" id="kmViatura">
                </div>

            </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Sair</button>
                <button type="button" class="btn btn-primary">Registrar</button>
            </div>
            </div>
        </div>
        </div> --}}

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
               Guarnição: <select name="guarnicao_id" autofocus class="form-control @error('guarnicao_id')
                is-invalid @enderror">
                    <option>Escolha uma Guarnição</option>
                    
                    @foreach($guarnicoes as $g)
                        @if('guarnicao_id' == $g->id)
                            <option value="{{$g->id}}" selected="selected">{{$g->prefixo}} - {{$g->descricao}}</option>
                        @else
                            <option value="{{$g->id}}">{{$g->prefixo}} - {{$g->descricao}}</option>
                        @endif
                    @endforeach
                </select>
                 @error('guarnicao_id')
                <span>
                    <strong>{{$message}}</strong>    
                </span>    
                @enderror
            </div>
            <br>
            <div>
                Cidade: <select name="cidade_id" autofocus class="form-control @error('cidade_id')
                is-invalid @enderror">
                     <option>Escolha uma Cidade</option>
                     
                     @foreach($cidades as $c)
                         @if('cidade_id' == $c->id)
                             <option value="{{$c->id}}" selected="selected">{{$c->nome}}</option>
                         @else
                             <option value="{{$c->id}}">{{$c->nome}}</option>
                         @endif
                     @endforeach
                 </select>
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
            <div>
             <ul>
                @foreach (Session::get('registro') as $r => $item )
               
                    @if ($item != null)
                        <li>{{ $item['postoGraduacao']}}  {{ $item['matricula']}}  {{ $item['nomeGuerra']}}
                        Viatura {{$item['patrimonio']}} <a href="/remover/registro/{{$r}}">Remover</a></li>
                    @endif
                @endforeach
                @error('militar_id')
                    <span>
                        <strong>{{$message}}</strong>    
                    </span>    
                 @enderror
             </ul>
             </div>
             <br>
            <a href="/cadastro/servico/registro">Adicionar Registro</a>
             <br>
             <br>
            <input type="submit" value="Salvar">
        </form>
    </body>
    @endsection
</html>