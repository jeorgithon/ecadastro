<?php

namespace App\Http\Controllers;

use App\Models\Cidade;
use Illuminate\Http\Request;

class CidadeController extends Controller
{
  public function adicionar()
  {
    $this->authorize('create', \App\Models\Cidade::class);
    return view('cadastroCidade');
  }

  public function salvar(Request $r)
  {
    $this->authorize('create', \App\Models\Cidade::class);
    try {
      \App\Validator\CidadeValidator::validate($r->all());
      Cidade::create($r->all());
      return redirect('listar/cidade');
    } catch (\App\Validator\ValidatorException $th) {
      return redirect('cadastro/cidade')->withErrors($th->getValidator())->withInput();
    }
  }

  public function listar()
  {
    $this->authorize('view', \App\Models\Cidade::class);
    $listaCidade  = Cidade::all();

    return view('listarCidade', ['lista' => $listaCidade]);
  }


  public function remover($id)
  {
    $this->authorize('delete', \App\Models\Cidade::class);
    Cidade::destroy($id);
    return redirect('listar/cidade');
  }

  public function getEditar($id)
  {
    $this->authorize('update', \App\Models\Cidade::class);
    $cidade =  Cidade::find($id);
    return view('editarCidade', ['cidade' => $cidade]);
  }

  public function editar(Request $r)
  {
    $this->authorize('update', \App\Models\Cidade::class);
    try {
      \App\Validator\CidadeValidator::validate($r->all());
      $cidade =  Cidade::find($r->id);
      $cidade->companhia = $r->companhia;
      $cidade->nome = $r->nome;
      $cidade->update();
      return redirect('listar/cidade');
    } catch (\App\Validator\ValidatorException $th) {
      $cidade =  Cidade::find($r->id);
      return view('editarCidade', ['cidade' => $cidade])->withErrors($th->getValidator());
    }
  }
}
