<?php

namespace App\Validator;

use App\Models\Registro;
use Illuminate\Http\Request;

class RegistroValidator extends \Exception
{
    
    public static function validate($data, Request $r){
        $validator = \Validator::make($data, Registro::$rules, Registro::$messages);
        //dd($data);

        $listRegistro = $r->session()->get('registro');
        
        if(array_key_exists($data['militar_id'], $listRegistro))
        {
            $validator->errors()->add('militar_id', 'O militar já está na lista');
            //dd($listRegistro);
        }


        if(!$validator->errors()->isEmpty() )
        {
            throw new ValidatorException($validator, "Erro na validação do Registro");
        }

    }
}

