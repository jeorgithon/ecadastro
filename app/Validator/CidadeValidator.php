<?php

namespace App\Validator;

use App\Models\Cidade;

class CidadeValidator extends \Exception
{
    
    public static function validate($data){
        $validator = \Validator::make($data, Cidade::$rules, Cidade::$messages);

        if(!$validator->errors()->isEmpty() )
        {
            throw new ValidatorException($validator, "Erro na validação da Cidade");
        }

    }
}
