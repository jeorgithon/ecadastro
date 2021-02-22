<?php

namespace App\Validator;


use App\Models\Guarnicao;
use Illuminate\Support\Facades\DB;

class GuarnicaoValidator extends \Exception
{
    
    public static function validate($data){
        $validator = \Validator::make($data, Guarnicao::$rules, Guarnicao::$messages);

         //se estiver editando o índece id existirá no array $data
         if(array_key_exists('id', $data)){
            $guarnicao = DB::table('guarnicaos')
            ->where([['guarnicaos.id','<>',$data['id']], ['guarnicaos.prefixo','=',$data['prefixo']]])         
            ->first();

            
            if(!is_null($guarnicao)){     
                $validator->errors()->add('prefixo', '"O prefixo já existe no sistema.');                    
            }
        }
        //caso de um novo cadastro 
        else{
            $guarnicao = DB::table('guarnicaos')
            ->where('guarnicaos.prefixo','=',$data['prefixo'])        
            ->first(); 
            if(!is_null($guarnicao)){     
                $validator->errors()->add('prefixo', '"O prefixo já existe no sistema.');                    
            }
        }

        if(!$validator->errors()->isEmpty() )
        {
            throw new ValidatorException($validator, "Erro na validação da Guarnição");
        }

    }
}
