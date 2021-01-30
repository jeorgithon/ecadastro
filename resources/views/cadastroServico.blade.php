<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Cadastro de Serviço</title>

        
    </head>
    <body class="antialiased">
        <h1> Cadastrar Serviço</h1>

        <a href="/">Página Inicial</a>
       
        <form method= "POST" action="/cadastro/servico">
            
            @csrf<!--previne contra ataques, o laravel exige a tag-->
            <div>
            Data de início: <input type="datetime-local" name="dataHoraInicial" value="{{old('dataHoraInicial')}}" class="form-control @error('dataHoraInicial')
            is-invalid @enderror"/> <br>
            @error('dataHoraInicial')
                <span>
                    <strong>{{$message}}</strong>    
                </span>    
            @enderror
             </div>
             <br>
            <div>
            Data de termino: <input type="datetime-local" name="dataHoraFinal" value="{{old('dataHoraFinal')}}" class="form-control @error('dataHoraFinal')
            is-invalid @enderror"/> <br>
            @error('dataHoraFinal')
                <span>
                    <strong>{{$message}}</strong>    
                </span>    
            @enderror
             </div>
             <br>
            
            <div>
               Guarnição <select name="guarnicao_id" autofocus >
                    <option>Escolha uma Guarnição</option>
                    
                    @foreach($guarnicoes as $g)
                        @if('guarnicao_id' == $g->id)
                            <option value="{{$g->id}}" selected="selected">{{$g->prefixo}}</option>
                        @else
                            <option value="{{$g->id}}">{{$g->prefixo}}</option>
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
                Cidade <select name="cidade_id" autofocus >
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
                Observações: <textarea cols="40" rows="5" maxlength="200" name="observacao" value="{{old('observacao')}}" class="form-control @error('observacao')
                is-invalid @enderror"></textarea> <br>
             </div>
         
            <input type="submit" value="Salvar">
        </form>
    </body>
</html>
