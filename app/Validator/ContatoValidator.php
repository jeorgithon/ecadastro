<?php

namespace App\Validator;

use App\Models\Contato;



class ContatoValidator extends \Exception
{
    
    public static function validate($data){
        $validator = \Validator::make($data, Contato::$rules, Contato::$messages);

        if(!$validator->errors()->isEmpty() )
        {
            throw new ValidatorException($validator, "Erro na validação do Contato");
        }

    }
}
