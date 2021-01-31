<?php

namespace App\Http\Controllers;

use App\Models\Cidade;
use App\Models\Guarnicao;
use App\Models\Servico;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;

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
            \App\Validator\ServicoValidator::validate($r->all());
           Servico::create($r->all());
           return redirect('listar/servico');
        } catch (\App\Validator\ValidatorException $th) {
            $listGuarnicao = Guarnicao::all();
            $listCidade = Cidade::all();
            return redirect('cadastro/servico')->with(['guarnicoes'=>$listGuarnicao, 'cidades'=>$listCidade])
            -> withErrors($th->getValidator())->withInput();
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
        $listCidade = Cidade::all();
        $listGuarnicao = Guarnicao::all();
        $servico =  Servico::find($id);
        
        $dateinicial = new DateTime($servico->dataHoraInicial);
        $dateinicial =  $dateinicial->format('Y-m-d\TH:i');

        $datefinal = new DateTime($servico->dataHoraFinal);
        $datefinal =  $datefinal->format('Y-m-d\TH:i');
    //    dd($servico->dataHoraFinal);
        
       return view('editarServico', ['servico' => $servico, 'cidades'=>$listCidade,
        'guarnicoes'=>$listGuarnicao, 'inicio'=>$dateinicial, 'fim'=>$datefinal]);
    }

    public function editar(Request $r)
    {
        $servico =  Servico::find($r->id);
        $servico->dataHoraInicial = $r->dataHoraInicial;
        $servico->dataHoraFinal = $r->dataHoraFinal;
        $servico->guarnicao_id = $r->guarnicao_id;
        $servico->cidade_id = $r->cidade_id;
        $servico->update();

        return redirect('listar/servico');
    }
}
