<?php

namespace App\Validator;


use App\Models\Servico;

class ListarServicosValidator extends \Exception
{

    public static function validate($data)
    {
        
        $validator = \Validator::make($data, Servico::$rulesList, Servico::$messages);
        
        $dataInicial = $data['dataHoraInicial'];
        $dataFinal = $data['dataHoraFinal'];
        //validação da data
        if($dataInicial >= $dataFinal){
            $validator->errors()->add('dataHoraFinal', 'A data/hora Final deve ser posterior a data/hora inicial');
        }

        if (!$validator->errors()->isEmpty()) {
            throw new ValidatorException($validator, "Erro na validação do Período para listar os serviços");
        }
    }
}
