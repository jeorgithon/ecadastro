<?php

namespace App\Validator;

use \App\Models\Militar;
use Illuminate\Support\Facades\DB;


class MilitarValidator extends \Exception
{
    
    public static function validate($data){
        $validator = \Validator::make($data, Militar::$rules, Militar::$messages);

        //se estiver editando o índece id existirá no array $data
        if(array_key_exists('id', $data)){
            $militar = DB::table('militars')
            ->where([['militars.id','<>',$data['id']], ['militars.matricula','=',$data['matricula']]])
            ->orWhere([['militars.id','<>',$data['id']], ['militars.email','=',$data['email']]])         
            ->first();

            
            if(!is_null($militar)){
                    if($militar->email == $data['email']){
                        $validator->errors()->add('email', 'O email já existe no sistema.');
                    }
                    if($militar->matricula == $data['matricula']){
                        $validator->errors()->add('matricula', '"A matricula já existe no sistema.');
                    }
                    
            }
        }
        //caso de um novo cadastro 
        else{
            $militar = DB::table('militars')
            ->where('militars.matricula','=',$data['matricula'])
            ->orWhere('militars.email','=', $data['email'])         
            ->first(); 
            if(!is_null($militar)){
                    if($militar->email == $data['email']){
                        $validator->errors()->add('email', 'O email já existe no sistema.');
                    }
                    if($militar->matricula == $data['matricula']){
                        $validator->errors()->add('matricula', '"A matricula já existe no sistema.');
                    }
                    
            }
        }

        if(!$validator->errors()->isEmpty() )
        {
            throw new ValidatorException($validator, "Erro na validação de Militar");
        }

    }
}
