<?php

namespace App\Http\Controllers;

use App\Models\Viatura;
use Illuminate\Http\Request;

class ViaturaController extends Controller
{
  public function adicionar()
  {
    $this->authorize('create', \App\Models\Viatura::class);
    return view('cadastroViatura');
  }

  public function salvar(Request $r)
  {
    $this->authorize('create', \App\Models\Viatura::class);
    try {
      \App\Validator\ViaturaValidator::validate($r->all());
      Viatura::create($r->all());

      return redirect('listar/viatura');
    } catch (\App\Validator\ValidatorException $th) {
      return redirect('cadastro/viatura')->withErrors($th->getValidator())->withInput();
    }
  }

  public function listar()
  {
    $this->authorize('view', \App\Models\Viatura::class);
    $listaViatura  = Viatura::all();

    return view('listarViatura', ['lista' => $listaViatura]);
  }


  public function remover($id)
  {
    $this->authorize('delete', \App\Models\Viatura::class);
    Viatura::destroy($id);
    return redirect('listar/viatura');
  }

  public function getEditar($id)
  {
    $this->authorize('update', \App\Models\Viatura::class);
    $viatura =  Viatura::find($id);
    return view('editarViatura', ['viatura' => $viatura]);
  }

  public function editar(Request $r)
  {
    $this->authorize('update', \App\Models\Viatura::class);
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
