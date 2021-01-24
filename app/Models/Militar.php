<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Militar extends Model
{
    use HasFactory;
    
	protected $fillable= ['nomeCompleto', 'nomeGuerra', 'matricula', 'postoGraduacao', 'ome', 'permissao', 'usuario', 'senha'];
	
	public static $rules = ['nomeCompleto'=> 'required|min:5| max:40','senha'=>'required|min:8',
	'nomeGuerra'=>'required', 'matricula'=>'required|min:7|max:8', 'permissao'=>'required', 'postoGraduacao'=>'required',
	'ome'=>'required', 'usuario'=>'required|min:6|max:12'];
	
	public static $messages = ['nomeCompleto.*'=>'Nome é um campo obrigatório entre 5 e 40 cacteres', 
	'senha.*'=>'O campo senha é o obrigatório e deve ter no mínimo 8 dígitos', 
	'matricula.*'=>'matricula é um campo obrigratório com mínimo de 7 dígitos e máximo 8',
	'nomeGuerra.*'=>'nome de guerra é um campo obrigatório', 'ome.*'=>'OME é um campo obrigatório',
	'permissao.*'=>'permisão é um campo obrigatório', 'usuario.*'=>'Usuário é um campo obrigatório com mínimo de 6 dígitos
	e maximo de 12 dígitos', 'postoGraduacao.*'=>'Posto/Graduação é um campo obrigatório'];
	
	public function contatos() {
		return $this->hasMany('\App\Models\Contato');
	}
	
	public function registros() {
		return $this->hasMany('\App\Models\Registro');
	}
}
