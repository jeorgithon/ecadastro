<?php

namespace App\Validator;


use App\Models\Servico;

class ServicoValidator extends \Exception
{
    
    public static function validate($data){
        $validator = \Validator::make($data, Servico::$rules, Servico::$messages);

        if(!$validator->errors()->isEmpty() )
        {
            throw new ValidatorException($validator, "Erro na validação do Serviço");
        }

    }
}
