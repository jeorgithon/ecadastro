<?php

namespace App\Validator;


use App\Models\Servico;
use App\Models\Viatura;
use Illuminate\Http\Request;

class ServicoValidator extends \Exception
{

    public static function validate($data, Request $r)
    {
        
        $validator = \Validator::make($data, Servico::$rules, Servico::$messages);

        $dataInicial = $data['dataHoraInicial'];
        $dataFinal = $data['dataHoraFinal'];

        if($dataInicial >= $dataFinal){
            $validator->errors()->add('dataHoraFinal', 'A data/hora Final deve ser posterior a data/hora inicial');
        }
        

        $listRegistro = $r->session()->get('registro');
        $quantidade = count($listRegistro);

        if ($quantidade < 2 || $quantidade > 4) {
            $validator->errors()->add('guarnicao_id', 'A guarnição deve ter no mínimo dois militares e no máximo 4 militares');
        }

        $listViatura = array();

        foreach ($listRegistro as $l) {

            array_push($listViatura, Viatura::find($l['viatura_id']));
        }

        if ($listRegistro != null) {
            $tipoVT = $listViatura[0]['tipo'];
            $listPat = array();

            foreach ($listViatura as $v) {
                if ($tipoVT != $v['tipo']) {

                    $validator->errors()->add('guarnicao_id', "Todos os militares devem está com o mesmo tipo de viatura (carro ou moto)");
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
                            'guarnicao_id',
                            "No caso da viatura ser do tipo moto, deve ser cadastra um único militares por moto"
                        );
                    }
                }
            }
        }

        else {
            $validator->errors()->add('guarnicao_id', 'A guarnição deve ter no mínimo dois militares e no máximo 4 militares');
        }
        


        if (!$validator->errors()->isEmpty()) {
            throw new ValidatorException($validator, "Erro na validação do Serviço");
        }
    }
}
