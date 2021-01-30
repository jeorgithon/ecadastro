<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guarnicao extends Model
{
    use HasFactory;
    protected $fillable = ['prefixo', 'descricao'];

    public static $rules = ['prefixo'=>'required', 'descricao'=>'required'];
	
	public static $messages = ['prefixo.*'=>'Campo Obrigatório', 'descricao.*'=>'Campo Obrigatório'];
	
    
    public function servicos() {
		return $this->hasMany('\App\Models\Servico');
	}
}
