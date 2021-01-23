<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servico extends Model
{
    use HasFactory;
	protected $fillable = ['dataHoraInicial', 'dataHoraFinal', 'observacao', 'nota'];
	
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
