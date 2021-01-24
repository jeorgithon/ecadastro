<?php

namespace App\Validator;



class ValidatorException extends \Exception 
{
    
    protected $validator;
    
    public function __construct($validator, $text = "Erro na validação do dados")
    {
       parent::__construct($text);
       $this->validator = $validator; 
    }

    public function getValidator(){
        return $this->validator;
    }
}
