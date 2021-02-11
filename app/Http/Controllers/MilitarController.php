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

      //cadastro do user
      $user = new \App\Models\User();
      $user->name = $r->nomeGuerra;
      $user->email = $r->email;
      $user->password = Hash::make($r->matricula);
      $user->permissao = $r->permissao;
      $user->save();

      return redirect('listar/militar');
    } catch (\App\Validator\ValidatorException $th) {

      return redirect('cadastroMilitar')->withErrors($th->getValidator())->withInput();
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
