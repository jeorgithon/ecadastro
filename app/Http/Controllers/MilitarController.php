<?php

namespace App\Http\Controllers;

use App\Models\Militar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MilitarController extends Controller
{
    public function adicionar(){
      $this->authorize('create', \App\Models\Militar::class);
		  return view('cadastroMilitar');
    }
    
    public function salvar(Request $r){
      try {
        \App\Validator\MilitarValidator::validate($r->all());
        
        
       $militar =  Militar::create($r->all());
       
       $militar->contatos()->saveMany([ new \App\Models\Contato(['contato' => $r->celular]),
       new \App\Models\Contato(['contato' => $r->fixo])]);

       //cadastro do user
       $user = new \App\Models\User();
       $user->name = $r->nomeGuerra;
       $user->email = $r->email; 
       $user->password = Hash::make($r->matricula);;
       $user->save();
       
       return redirect('listar/militar');
      } catch (\App\Validator\ValidatorException $th) {
        
       return redirect('cadastroMilitar')->withErrors($th->getValidator())->withInput();
      }
      
    }
    
    public function listar(){
        $listaMilitar  = Militar::all();

		return view('listarMilitar', ['lista'=>$listaMilitar]);
    }


    public function remover($id){
         Militar::destroy($id);
         return redirect('listar/militar');
     }

     public function getEditar($id){
           $militar =  Militar::find($id);
             return view('editarMilitar', ['militar'=>$militar]);
         }
    
     public function editar(Request $r){
        $militar =  Militar::find($r->id);
        $militar->nomeCompleto = $r->nomeCompleto;
        $militar->nomeGuerra = $r->nomeGuerra;
        $militar->matricula = $r->matricula;
        $militar->postoGraduacao = $r->postoGraduacao;
        $militar->ome = $r->ome;
        $militar->permissao = $r->permissao;
        $militar->update();
        
        return redirect('listar/militar');
        }
        
}
