<?php

namespace App\Validator;


use App\Models\Guarnicao;

class GuarnicaoValidator extends \Exception
{
    
    public static function validate($data){
        $validator = \Validator::make($data, Guarnicao::$rules, Guarnicao::$messages);

        if(!$validator->errors()->isEmpty() )
        {
            throw new ValidatorException($validator, "Erro na validação da Viatura");
        }

    }
}
