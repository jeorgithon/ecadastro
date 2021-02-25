<?php

namespace App\Http\Controllers;

use App\Models\Cidade;
use App\Models\Guarnicao;
use App\Models\Militar;
use App\Models\Servico;
use App\Models\Viatura;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;

class ServicoController extends Controller
{
    public function buscarRegistro()
    {
        $this->authorize('create', \App\Models\Servico::class);
        $listaMilitar = Militar::all();
        $listViatura = Viatura::all();
        return view('registro', ['militar' => $listaMilitar, 'viatura' => $listViatura]);
    }
    public function adicionarRegistro(Request $r)
    {
        $this->authorize('create', \App\Models\Servico::class);
        try {
            \App\Validator\RegistroValidator::validate($r->all(), $r);
            if ($r->session()->has('registro')) {
                $listRegistro = $r->session()->get('registro');
                //;
            } else {
                $listRegistro = array();
            }
            $militar = Militar::find($r->militar_id);
            $viatura = Viatura::find($r->viatura_id);

            // Se na view a opção motorista ou comandante não for 
            // marcada a view retornará o valor nulo, que não é aceito 
            // pelo banco de dados como um valor falso, logo, esse bloco 
            // condicional identifica o valor nulo e seta os valores
            // os padrões do sgbd.

            if (!$r->comandante) {
                $registro['comandante'] = false;
            } else {
                $registro['comandante'] = true;
            }

            if (!$r->motorista) {
                $registro['motorista'] = false;
            } else {
                $registro['motorista'] = true;
            }


            $registro['militar_id'] = $r->militar_id;
            $registro['viatura_id'] = $r->viatura_id;
            $registro['km'] = $r->km;
            $registro['postoGraduacao'] = $militar->postoGraduacao;
            $registro['nomeGuerra'] = $militar->nomeGuerra;
            $registro['matricula'] = $militar->matricula;
            $registro['patrimonio'] = $viatura->patrimonio;

            $listRegistro[$r->militar_id] = $registro;

            $r->session()->put('registro', $listRegistro);


            return redirect('/cadastro/servico');
        } catch (\App\Validator\ValidatorException $th) {
            $listaMilitar = Militar::all();
            $listViatura = Viatura::all();
            return redirect('cadastro/servico/registro')->with(['militar' => $listaMilitar, 'viatura' => $listViatura])
                ->withErrors($th->getValidator())->withInput();
        }
    }
    public function adicionar(Request $request)
    {
        $this->authorize('create', \App\Models\Servico::class);
        if (!$request->session()->has('registro')) {
            $listRegistro = array();
            $request->session()->put('registro', $listRegistro);
        }
        $listcidade = Cidade::all();
        $listguarnicao = Guarnicao::all();
        date_default_timezone_set('America/Sao_Paulo');
        $dataminima = date('Y-m-d\T00:00');
        $datamaxima = date('Y-m-d\T23:59');
       
        

        return view('cadastroServico', ['cidades' => $listcidade, 'guarnicoes' => $listguarnicao,
         'min' => $dataminima, 'max'=>$datamaxima]);
    }

    public function salvar(Request $r)
    {
        $this->authorize('create', \App\Models\Servico::class);
        try {
            \App\Validator\ServicoValidator::validate($r->all(), $r);
            $listRegistro = $r->session()->get('registro');
           
            $registros = array();
            foreach ($listRegistro as $k => $reg) {
                $registros[] = \App\Models\Registro::make([
                    'viatura_id' => $reg['viatura_id'],
                    'km' => $reg['km'],
                    'militar_id' => $reg['militar_id'],
                    'comandante' => $reg['comandante'],
                    'motorista' => $reg['motorista']
                ]);
                //atualizando o km da viatura
                $viatura = Viatura::find($reg['viatura_id']);
                $viatura->km = $reg['km'];
                $viatura->update();
            }
            
            $servico = Servico::create($r->all());
            $servico->registros()->saveMany($registros);
            
            $listRegistro = array();
            $r->session()->put('registro', $listRegistro);

            
            return redirect('/index');
        } catch (\App\Validator\ValidatorException $th) {
            $listGuarnicao = Guarnicao::all();
            $listCidade = Cidade::all();
            return redirect('cadastro/servico')->with(['guarnicoes' => $listGuarnicao, 'cidades' => $listCidade])
                ->withErrors($th->getValidator())->withInput();
        } 
    }

    public function listar()
    {
        $this->authorize('view', \App\Models\Servico::class);
        $listaServico  = Servico::all();
        return view('listarServico', ['lista' => $listaServico]);
    }

    public function view(Request $r)
    {
        $this->authorize('view', \App\Models\Servico::class);
        try {
            \App\Validator\ListarServicosValidator::validate($r->all());
                $intervalos = $r->all();
                $servicos = \App\Models\Servico::
                where('dataHoraInicial','>=', $intervalos['dataHoraInicial'])
                ->where('dataHoraInicial','<=', $intervalos['dataHoraFinal'])
                ->get(); 
                return view('listarServico', ['lista' => $servicos]);
        } catch (\App\Validator\ValidatorException $th) {
            return redirect('/listar/servicos/get/data')->withErrors($th->getValidator())->withInput();
        }

       
    }

    
    public function getDate()
    {
        $this->authorize('view', \App\Models\Servico::class);
        return view('getdate');
    }


    public function remover($id)
    {
        $this->authorize('delete', \App\Models\Servico::class);
        Servico::destroy($id);
        return redirect('listar/servico');
    }

    public function removerRegistro($id, Request $r)
    {
        $this->authorize('delete', \App\Models\Servico::class);
        $listRegistro = $r->session()->get('registro');
        unset($listRegistro[$id]);
        $r->session()->put('registro', $listRegistro);
        return redirect('cadastro/servico');
    }

    

    public function getEditar($id, Request $r, $erro = null)
    {
        $this->authorize('update', \App\Models\Servico::class);
        $listCidade = Cidade::all();
        $listGuarnicao = Guarnicao::all();
        $servico =  Servico::find($id);
       
        $dateinicial = new DateTime($servico->dataHoraInicial);
        $dateinicial =  $dateinicial->format('Y-m-d\TH:i');

        $datefinal = new DateTime($servico->dataHoraFinal);
        $datefinal =  $datefinal->format('Y-m-d\TH:i');
        
        //criando uma sessão vazia
        $listRegistro = array();
        $r->session()->put('registro', $listRegistro);

        $tempRegistros = \App\Models\Registro::where('servico_id', '=', $id)->get();
        $listRegistro = array();
       
        foreach($tempRegistros as $t){
            $militar = Militar::find($t['militar_id']);
            $viatura = Viatura::find($t['viatura_id']);
            $registro['comandante'] = $t['comandante'];
            $registro['motorista'] = $t['motorista'];
            $registro['militar_id'] = $t['militar_id'];
            $registro['viatura_id'] = $t['viatura_id'];
            $registro['km'] = $t['km'];
            $registro['postoGraduacao'] = $militar->postoGraduacao;
            $registro['nomeGuerra'] = $militar->nomeGuerra;
            $registro['matricula'] = $militar->matricula;
            $registro['patrimonio'] = $viatura->patrimonio;

            $listRegistro[$t['militar_id']] = $registro;
        }
        $r->session()->put('registro', $listRegistro);

        date_default_timezone_set('America/Sao_Paulo');
        $dataminima = date('Y-m-d\T00:00');
        $datamaxima = date('Y-m-d\T23:59');

        if($erro!= null){
            //dd('pegou o erro');
            return view('editarServico', [
                'servico' => $servico, 'cidades' => $listCidade, 'min' => $dataminima, 'max'=>$datamaxima,
                'guarnicoes' => $listGuarnicao, 'inicio' => $dateinicial, 'fim' => $datefinal
            ]);
        }
        return view('editarServico', [
            'servico' => $servico, 'cidades' => $listCidade, 'min' => $dataminima, 'max'=>$datamaxima,
            'guarnicoes' => $listGuarnicao, 'inicio' => $dateinicial, 'fim' => $datefinal
        ]);
    }

    public function editar(Request $r)
    {
        $this->authorize('update', \App\Models\Servico::class);   
        try {
            \App\Validator\ServicoValidator::validate($r->all(), $r);
            $servico =  Servico::find($r->id);
            $servico->dataHoraInicial = $r->dataHoraInicial;
            $servico->dataHoraFinal = $r->dataHoraFinal;
            $servico->guarnicao_id = $r->guarnicao_id;
            $servico->cidade_id = $r->cidade_id;
            $servico->observacao = $r->observacao;
            $servico->update();

            //limpa a sesão
            $listRegistro = array();
            $r->session()->put('registro', $listRegistro);
            return redirect('listar/servico');
        } catch (\App\Validator\ValidatorException $th) {
            $listGuarnicao = Guarnicao::all();
            $listCidade = Cidade::all();
            $servico =  Servico::find($r->id);
            $dateinicial = new DateTime($servico->dataHoraInicial);
            $dateinicial =  $dateinicial->format('Y-m-d\TH:i');
            $datefinal = new DateTime($servico->dataHoraFinal);
            $datefinal =  $datefinal->format('Y-m-d\TH:i');
            date_default_timezone_set('America/Sao_Paulo');
            $dataminima = date('Y-m-d\T00:00');
            $datamaxima = date('Y-m-d\T23:59');
            return view('editarServico', [
                'servico' => $servico, 'cidades' => $listCidade, 'min' => $dataminima, 'max'=>$datamaxima,
                'guarnicoes' => $listGuarnicao, 'inicio' => $dateinicial, 'fim' => $datefinal
            ])->withErrors($th->getValidator());
        } 
            
        }
}
