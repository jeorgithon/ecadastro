<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Militar extends Model
{
    use HasFactory;
    
    protected $fillable= ['nomeCompleto', 'nomeGuerra', 'matricula', 'postoGraduacao', 'ome', 'permissao', 'usuario', 'senha'];
    
    public function contatos() {
		return $this->hasMany('\App\Models\Contato');
	}
	
	public function registros() {
		return $this->hasMany('\App\Models\Registro');
	}
}
