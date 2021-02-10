<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Militar extends Model
{
    use HasFactory;
    
	protected $fillable= ['nomeCompleto', 'nomeGuerra', 'matricula', 'postoGraduacao', 'ome', 'permissao', 'email'];
	
	public static $rules = ['nomeCompleto'=> 'required|min:5| max:40','nomeGuerra'=>'required', 
	'matricula'=>'required|min:7|max:8', 'permissao'=>'required', 'postoGraduacao'=>'required',
	'ome'=>'required', 'email'=>'required'];
	
	public static $messages = ['nomeCompleto.*'=>'Nome é um campo obrigatório entre 5 e 40 cacteres', 
	'matricula.*'=>'matricula é um campo obrigratório com mínimo 7 e máximo 8 dígitos',
	'nomeGuerra.*'=>'nome de guerra é um campo obrigatório', 'ome.*'=>'OME é um campo obrigatório',
	'permissao.*'=>'permisão é um campo obrigatório', 'email.*'=>'Email é um campo obrigatório com mínimo de 6 dígitos
	e maximo de 12 dígitos', 'postoGraduacao.*'=>'Posto/Graduação é um campo obrigatório'];
	
	public function contatos() {
		return $this->hasMany('\App\Models\Contato');
	}
	
	public function registros() {
		return $this->hasMany('\App\Models\Registro');
	}
}
