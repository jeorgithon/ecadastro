<?php

namespace App\Http\Controllers;

use App\Models\Cidade;
use App\Models\Guarnicao;
use App\Models\Servico;
use Illuminate\Http\Request;

class ServicoController extends Controller
{
    public function adicionar()
    {
        $listcidade = Cidade::all();
        $listguarnicao = Guarnicao::all();

        return view('cadastroServico', ['cidades'=>$listcidade, 'guarnicoes'=>$listguarnicao]);

    }

    public function salvar(Request $r)
    {
        try {
            //  \App\Validator\MilitarValidator::validate($r->all());
            Servico::create($r->all());
            return redirect('listar/guarnicao');
        } catch (\App\Validator\ValidatorException $th) {
            return redirect('cadastroServico')->withErrors($th->getValidator())->withInput();
        }
    }

    public function listar()
    {
        $listaServico  = Servico::all();

        return view('listarServico', ['lista' => $listaServico]);
    }


    public function remover($id)
    {
        Servico::destroy($id);
        return redirect('listar/servico');
    }

    public function getEditar($id)
    {
        $servico =  Servico::find($id);
        return view('editarServico', ['servico' => $servico]);
    }

    public function editar(Request $r)
    {
        //

        return redirect('listar/guarnicao');
    }
}
