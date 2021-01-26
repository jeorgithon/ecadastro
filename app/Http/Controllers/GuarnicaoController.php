<?php

namespace App\Http\Controllers;

use App\Models\Guarnicao;
use Illuminate\Http\Request;

class GuarnicaoController extends Controller
{
    public function adicionar(){
		return view('cadastroGuarnicao');
    }

    public function salvar(Request $r){
        try {
        //  \App\Validator\MilitarValidator::validate($r->all());
          Guarnicao::create($r->all());
        return redirect('listar/guarnicao');
        } catch (\App\Validator\ValidatorException $th) {
          return redirect('cadastroGuarnicao')->withErrors($th->getValidator())->withInput();
        }
        
      }

      public function listar(){
        $listaGuarnicao  = Guarnicao::all();

		return view('listarGuarnicao', ['lista'=>$listaGuarnicao]);
    }


    public function remover($id){
        Guarnicao::destroy($id);
        return redirect('listar/guarnicao');
     }

     public function getEditar($id){
        $guarnicao =  Guarnicao::find($id);
          return view('editarGuarnicao', ['guarnicao'=>$guarnicao]);
      }
 
  public function editar(Request $r){
     $guarnicao =  Guarnicao::find($r->id);
     $guarnicao->prefixo = $r->prefixo;
     $guarnicao->descricao = $r->descricao;
     $guarnicao->update();
        
     return redirect('listar/guarnicao');
     }
}
