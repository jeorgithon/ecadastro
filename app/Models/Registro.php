<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registro extends Model
{
    use HasFactory;
    protected $fillable = ['km', 'comandante', 'motorista', 'viatura_id', 'militar_id', 'servico_id'];
    public function servico() {
		return $this->belongsTo('\App\Models\Servico');
	}

	public static $rules = ['militar_id'=> 'required|numeric','viatura_id'=>'required|numeric', 
	'km'=>'required'];
	
	public static $messages = ['militar_id.*'=>'Selecione um Militar', 
	'viatura_id.*'=>'Selecione uma viatura',
	'km.*'=>'Insira o KM da viatura'];
	
	public function viatura() {
		return $this->belongsTo('\App\Models\Viatura');
	}
	
	public function militar() {
		return $this->belongsTo('\App\Models\Militar');
	}
	
	
}
