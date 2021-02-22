<?php

namespace App\Http\Controllers;

use App\Models\Militar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MilitarController extends Controller
{
  public function adicionar()
  {
    $this->authorize('create', \App\Models\Militar::class);
    return view('cadastroMilitar');
  }

  public function salvar(Request $r)
  {
    $this->authorize('create', \App\Models\Militar::class);
    try {
      \App\Validator\MilitarValidator::validate($r->all());
      $militar =  Militar::create($r->all());
      $militar->contatos()->saveMany([
        new \App\Models\Contato(['contato' => $r->celular]),
        new \App\Models\Contato(['contato' => $r->fixo])
      ]);
      
      $user = new \App\Models\User();
      $user->name = $r->nomeCompleto;
      $user->email = $r->email;
      $user->password = Hash::make($r->matricula);
      //$user->militar()->associate($militar);
      $user->save();
      $militar->user_id = $user->id;
      $militar->save();
      return redirect('listar/militar');
    } catch (\App\Validator\ValidatorException $th) {

      return redirect('cadastroMilitar')->withErrors($th->getValidator())->withInput();
    }  catch (\Illuminate\Database\QueryException $th) {
      //Está aqui por redundância, mas já está sendo tratada na validação.
      echo "Email ou matricula já existe no sistema.";
    }
  }

  public function listar()
  {
    $this->authorize('view', \App\Models\Militar::class);
    $listaMilitar  = Militar::all();

    return view('listarMilitar', ['lista' => $listaMilitar]);
  }


  public function remover($id)
  {
    $this->authorize('delete', \App\Models\Militar::class);

    // sofdelete
    Militar::destroy($id);
    return redirect('listar/militar');
  }

  public function getEditar($id)
  {
    $this->authorize('update', \App\Models\Militar::class);
    $militar =  Militar::find($id);
    return view('editarMilitar', ['militar' => $militar]);
  }

  public function editar(Request $r)
  {
      $this->authorize('update', \App\Models\Militar::class);
      try{
        \App\Validator\MilitarValidator::validate($r->all());
        $militar =  Militar::find($r->id);
        $militar->nomeCompleto = $r->nomeCompleto;
        $militar->nomeGuerra = $r->nomeGuerra;
        $militar->matricula = $r->matricula;
        $militar->postoGraduacao = $r->postoGraduacao;
        $militar->ome = $r->ome;
        $militar->permissao = $r->permissao;
        $militar->update();
        return redirect('listar/militar');
    } catch (\App\Validator\ValidatorException $th) {
      $militar =  Militar::find($r->id);
      return view('editarMilitar', ['militar' => $militar])->withErrors($th->getValidator());
      
    }
    catch (\Illuminate\Database\QueryException $th) {
      //Está aqui por redundância, mas já está sendo tratada na validação.
      echo "Email ou matricula já existe no sistema.";
    }
  }
}
