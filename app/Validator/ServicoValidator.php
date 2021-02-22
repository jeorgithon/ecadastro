<?php

namespace App\Validator;


use App\Models\Servico;
use App\Models\Viatura;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ServicoValidator extends \Exception
{

    public static function validate($data, Request $r)
    {
        
        $validator = \Validator::make($data, Servico::$rules, Servico::$messages);
        
        $dataInicial = $data['dataHoraInicial'];
        $dataFinal = $data['dataHoraFinal'];

        //validação da data
        if($dataInicial >= $dataFinal){
            $validator->errors()->add('dataHoraFinal', 'A data/hora Final deve ser posterior a data/hora inicial');
        }
        
        //pegando a sessão
        $listRegistro = $r->session()->get('registro');
        $quantidade = count($listRegistro);

        //validando a quantidade de registros
        if ($quantidade < 2 || $quantidade > 4) {
            $validator->errors()->add('militar_id', 'A guarnição deve ter no mínimo dois militares e no máximo 4 militares');
        }

        //validação de quantidade de militares por viatura.
        $listViatura = array();
        foreach ($listRegistro as $l) {

            array_push($listViatura, Viatura::find($l['viatura_id']));
        }
        if ($listRegistro != null) {
            $tipoVT = $listViatura[0]['tipo'];
            $listPat = array();
            foreach ($listViatura as $v) {
                if ($tipoVT != $v['tipo']) {

                    $validator->errors()->add('militar_id', "Todos os militares devem está com o mesmo tipo de viatura (carro ou moto)");
                }
                array_push($listPat, $v['patrimonio']);
            }
            $contRepeticao = array_count_values($listPat);
            if ($tipoVT == 'carro' && count($listRegistro) > $contRepeticao[$listPat[0]]) {
                $validator->errors()->add(
                    'guarnicao_id',
                    "No caso da viatura ser do tipo carro, deve ser cadastra todos os militares em um único patrimônio"
                );
            }

            if ($tipoVT == 'moto') {
                foreach ($contRepeticao as $c) {
                    if ($c != 1) {
                        $validator->errors()->add(
                            'militar_id',
                            "No caso da viatura ser do tipo moto, deve ser cadastra um único militares por moto"
                        );
                    }
                }
            }
        }

        else {
            $validator->errors()->add('guarnicao_id', 'A guarnição deve ter no mínimo dois militares e no máximo 4 militares');
        }
        
        
        // validando se o militar já está cadastrado em outra viatura
        //A variável $data tem os dados do serviço a ser cadastrado
        // A variável $listRegistro tem uma lista dos registros a serem cadastrados
        if($data['dataHoraInicial'] != null){
            if($r->id == null){
               // dd('passou create');
                foreach($listRegistro as $reg){
                    $registros = DB::table('registros')
                    ->where('militar_id','=',$reg['militar_id'])
                    ->join('servicos', 'servicos.id','=', 'registros.servico_id')
                    -> where('servicos.dataHoraFinal', '>=', $data['dataHoraInicial'])
                    ->first();
                    
                    if(!is_null($registros)){
                            $validator->errors()->add('militar_id', 'O militar '.$reg[ 'nomeGuerra'].' já está ativado em outra guarnição');
                    }
                } 
            }
            else{
               // dd('passou update');
                foreach($listRegistro as $reg){
                    $registros = DB::table('registros')
                    ->where('militar_id','=',$reg['militar_id'])
                    ->join('servicos', 'servicos.id','=', 'registros.servico_id')
                    -> where('servicos.dataHoraFinal', '>=', $data['dataHoraInicial'])
                    -> where('servicos.id', '<>', $r->id)
                    ->first();
                   // dd($registros);
                    if(!is_null($registros)){
                            $validator->errors()->add('militar_id', 'O militar '.$reg[ 'nomeGuerra'].' já está ativado em outra guarnição');
                    }
                } 
            }
        }

        if (!$validator->errors()->isEmpty()) {
            throw new ValidatorException($validator, "Erro na validação do Serviço");
        }
    }
}
