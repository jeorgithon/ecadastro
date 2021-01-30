<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servico extends Model
{
    use HasFactory;
	protected $fillable = ['dataHoraInicial', 'dataHoraFinal', 'observacao', 'nota', 'guarnicao_id', 'cidade_id'];

	public static $rules = ['dataHoraInicial'=>'required', 'dataHoraFinal'=>'required',
	  'guarnicao_id'=>'required|numeric', 'cidade_id'=>'required|numeric'];
	
	public static $messages = ['dataHoraInicial.*'=>'Campo Obrigatório', 'dataHoraFinal.*'=>'Campo Obrigatório',
	  'guarnicao_id.*'=>'Campo Obrigatório', 'cidade_id.*'=>'Campo Obrigatório'];
  
	
    public function cidade() {
		return $this->belongsTo('\App\Models\Cidade');
	}
	
	public function guarnicao() {
		return $this->belongsTo('\App\Models\Guarnicao');
	}
	
	 public function registros() {
		return $this->hasMany('\App\Models\Registro');
	}
}
