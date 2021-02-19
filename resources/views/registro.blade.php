<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Adicionar Registro</title>

        
    </head>
    <body class="antialiased">
        <h1>Adicionar Registro</h1>

        <a href="/index">Página Inicial</a>
       
        <form method= "POST" action="/cadastro/servico/registro" autocomplete="on">
            
            @csrf<!--previne contra ataques, o laravel exige a tag-->
            <br>
            {{-- <div>
                <label for="militar">Matricula:</label>
                <input type="text" id="militar" name="militar" ><br><br>
            </div> --}}
            <div>
                Militar <select name="militar_id" autofocus >
                     <option>Escolha um Militar</option>
                     
                     @foreach($militar as $m)
                         @if('militar_id' == $m->id)
                             <option value="{{$m->id}}" selected="selected">{{$m->nomeGuerra}}</option>
                         @else
                             <option value="{{$m->id}}">{{$m->nomeGuerra}}</option>
                         @endif
                     @endforeach
                 </select>
                 <br>
                  @error('militar_id')
                 <span>
                     <strong>{{$message}}</strong>    
                 </span>    
                 @enderror
             </div>
             <br>
             <div>
                 <input type="checkbox" name="comandante" value={{true}}>
                 <label for="comandante" >Comandante</label><br>
             </div>
             <div>
                <input type="checkbox" name="motorista" value={{true}}>
                <label for="motorista" >Motorista</label><br>
            </div>
             <hr>
             <br>
             <div>
                Viatura <select name="viatura_id" autofocus >
                     <option>Escolha uma Viatura</option>
                     
                     @foreach($viatura as $v)
                         @if('viatura_id' == $v->id)
                             <option value="{{$v->id}}" selected="selected">{{$v->patrimonio}}</option>
                         @else
                             <option value="{{$v->id}}">{{$v->patrimonio}}</option>
                         @endif
                     @endforeach
                 </select>
                 <br>
                  @error('viatura_id')
                 <span>
                     <strong>{{$message}}</strong>    
                 </span>    
                 @enderror
             </div>
             <br>
             <div>
                KM: <input type="number" name="km" value="{{old('km')}}" class="form-control @error('km')
                is-invalid @enderror"/> <br>
                @error('km')
                <span>
                    <strong>{{$message}}</strong>    
                </span>    
                @enderror
            </div>
            
            <br>
            <hr>
            <input type="submit" value="Adicionar">
        </form>
    </body>
</html>
