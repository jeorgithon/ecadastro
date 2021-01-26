<?php

namespace App\Http\Controllers;

use App\Models\Viatura;
use Illuminate\Http\Request;

class ViaturaController extends Controller
{
    public function adicionar(){
		return view('cadastroViatura');
    }

    public function salvar(Request $r){
        try {
        //  \App\Validator\MilitarValidator::validate($r->all());
          Viatura::create($r->all());
          echo "salvou";
        return redirect('listar/viatura');
        } catch (\App\Validator\ValidatorException $th) {
          return redirect('cadastroViatura')->withErrors($th->getValidator())->withInput();
        }
        
      }

      public function listar(){
        $listaViatura  = Viatura::all();

		return view('listarViatura', ['lista'=>$listaViatura]);
    }


    public function remover($id){
        Viatura::destroy($id);
        return redirect('listar/viatura');
     }

     public function getEditar($id){
        $viatura =  Viatura::find($id);
          return view('editarViatura', ['viatura'=>$viatura]);
      }
 
  public function editar(Request $r){
     $viatura =  Viatura::find($r->id);
     $viatura->patrimonio = $r->patrimonio;
     $viatura->tipo = $r->tipo;
     $viatura->marca = $r->marca;
     $viatura->modelo = $r->modelo;
     $viatura->placa = $r->placa;
     $viatura->km = $r->km;
     $viatura->update();
        
     return redirect('listar/viatura');
     }
     
}
