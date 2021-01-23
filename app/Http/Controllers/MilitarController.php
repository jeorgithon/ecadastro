<?php

namespace App\Http\Controllers;

use App\Models\Militar;
use Illuminate\Http\Request;

class MilitarController extends Controller
{
    public function adicionar(){
		return view('cadastroMilitar');
    }
    
    public function salvar(Request $r){
       Militar::create($r->all());
    //    $contato =new \App\Models\Contato();
    // //    $contato->cotato =$r->celular;
    // //    $contato->militar_id= $r->id;
    // //    $contato->save();
    // //    $contato->cotato =$r->residecial;
    // //    $contato->save();
    //     $t = Militar::find($r->id);
    //     $t->contatos()->contato = $r->celular;
    //     $t->update();
		return redirect('listar');
    }
    
    public function listar(){
        $listaMilitar  = Militar::all();

		return view('listarMilitar', ['lista'=>$listaMilitar]);
    }


    public function remover($id){
    //    
    //    $militar->contatos()->delete();
    //    $militar->delete()->all();
        Militar::destroy($id);
         return redirect('listar');
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
           
        return redirect('listar');
        }
        
}
