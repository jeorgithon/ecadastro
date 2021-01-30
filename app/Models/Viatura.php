<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Viatura extends Model
{
    protected $fillable= ['placa', 'patrimonio', 'km', 'tipo', 'marca', 'modelo'];
    
    public static $rules= ['placa' =>'required', 'patrimonio'=>'required', 'km'=>'required|numeric', 
    'tipo'=>'required', 'marca'=>'required', 'modelo'=>'required'];

    public static $messages = ['placa.*' =>'Campo Obrigatório', 'patrimonio.*' =>'Campo Obrigatório',
     'km.*' =>'Campo Obrigatório, apenas números', 'tipo.*' =>'Campo Obrigatório', 'marca.*' =>'Campo Obrigatório', 
     'modelo.*' =>'Campo Obrigatório'];
    use HasFactory;
    
    public function registros() {
			return $this->hasMany('\App\Models\Registro');
	}
}
