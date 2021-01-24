<?php

namespace App\Validator;

use \App\Models\Militar;



class MilitarValidator extends \Exception
{
    
    public static function validate($data){
        $validator = \Validator::make($data, Militar::$rules, Militar::$messages);

        if(!$validator->errors()->isEmpty() )
        {
            throw new ValidatorException($validator, "Erro na validação de Militar");
        }

    }
}
