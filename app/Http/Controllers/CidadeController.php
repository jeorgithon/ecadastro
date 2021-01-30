<?php

namespace App\Http\Controllers;

use App\Models\Cidade;
use Illuminate\Http\Request;

class CidadeController extends Controller
{
    public function adicionar(){
      return view('cadastroCidade');
      
    }

    public function salvar(Request $r){
        try {
         \App\Validator\CidadeValidator::validate($r->all());
            Cidade::create($r->all());
            return redirect('listar/cidade');
        } catch (\App\Validator\ValidatorException $th) {
            return redirect('cadastro/cidade')->withErrors($th->getValidator())->withInput();
        }
        
      }

      public function listar(){
        $listaCidade  = Cidade::all();

		return view('listarCidade', ['lista'=>$listaCidade]);
    }


    public function remover($id){
        Cidade::destroy($id);
        return redirect('listar/cidade');
     }

     public function getEditar($id){
        $cidade =  Cidade::find($id);
          return view('editarCidade', ['cidade'=>$cidade]);
      }
 
  public function editar(Request $r){
     $cidade =  Cidade::find($r->id);
     $cidade->companhia = $r->companhia;
     $cidade->nome = $r->nome;
     $cidade->update();
        
     return redirect('listar/cidade');
     }
}
