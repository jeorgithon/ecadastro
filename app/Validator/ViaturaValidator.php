<?php

namespace App\Validator;


use App\Models\Viatura;
use Illuminate\Support\Facades\DB;

class ViaturaValidator extends \Exception
{
    
    public static function validate($data){
        $validator = \Validator::make($data, Viatura::$rules, Viatura::$messages);

         //se estiver editando o índece id existirá no array $data
         if(array_key_exists('id', $data)){
            $viatura = DB::table('viaturas')
            ->where([['viaturas.id','<>',$data['id']], ['viaturas.placa','=',$data['placa']]])         
            ->first();

            
            if(!is_null($viatura)){     
                $validator->errors()->add('placa', '"A placa já existe no sistema.');                    
            }
        }
        //caso de um novo cadastro 
        else{
            $viatura = DB::table('viaturas')
            ->where('viaturas.placa','=',$data['placa'])        
            ->first(); 
            if(!is_null($viatura)){     
                $validator->errors()->add('placa', '"A placa já existe no sistema.');                    
            }
        }

        if(!$validator->errors()->isEmpty() )
        {
            throw new ValidatorException($validator, "Erro na validação de Viatura");
        }

    }
}
