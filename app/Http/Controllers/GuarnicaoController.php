<?php

namespace App\Http\Controllers;

use App\Models\Guarnicao;
use Illuminate\Http\Request;

class GuarnicaoController extends Controller
{
  public function adicionar()
  {
    $this->authorize('create', \App\Models\Guarnicao::class);
    return view('cadastroGuarnicao');
  }

  public function salvar(Request $r)
  {
    $this->authorize('create', \App\Models\Guarnicao::class);
    try {
      \App\Validator\GuarnicaoValidator::validate($r->all());
      Guarnicao::create($r->all());
      return redirect('listar/guarnicao');
    } catch (\App\Validator\ValidatorException $th) {
      return redirect('cadastro/guarnicao')->withErrors($th->getValidator())->withInput();
    }
  }

  public function listar()
  {
    $this->authorize('view', \App\Models\Guarnicao::class);
    $listaGuarnicao  = Guarnicao::all();

    return view('listarGuarnicao', ['lista' => $listaGuarnicao]);
  }


  public function remover($id)
  {
    $this->authorize('delete', \App\Models\Guarnicao::class);
    Guarnicao::destroy($id);
    return redirect('listar/guarnicao');
  }

  public function getEditar($id)
  {
    $this->authorize('update', \App\Models\Guarnicao::class);
    $guarnicao =  Guarnicao::find($id);
    return view('editarGuarnicao', ['guarnicao' => $guarnicao]);
  }

  public function editar(Request $r)
  {
    $this->authorize('update', \App\Models\Guarnicao::class);
    $guarnicao =  Guarnicao::find($r->id);
    $guarnicao->prefixo = $r->prefixo;
    $guarnicao->descricao = $r->descricao;
    $guarnicao->update();

    return redirect('listar/guarnicao');
  }
}
