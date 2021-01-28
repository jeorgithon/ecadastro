<?php

namespace App\Validator;

use \App\Models\Militar;
use App\Models\Viatura;

class ViaturaValidator extends \Exception
{
    
    public static function validate($data){
        $validator = \Validator::make($data, Viatura::$rules, Viatura::$messages);

        if(!$validator->errors()->isEmpty() )
        {
            throw new ValidatorException($validator, "Erro na validação de Viatura");
        }

    }
}
