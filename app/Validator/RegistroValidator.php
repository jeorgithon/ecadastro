<?php

namespace App\Validator;

use App\Models\Registro;

class RegistroValidator extends \Exception
{
    
    public static function validate($data){
        $validator = \Validator::make($data, Registro::$rules, Registro::$messages);

        if(!$validator->errors()->isEmpty() )
        {
            throw new ValidatorException($validator, "Erro na validação do Registro");
        }

    }
}

