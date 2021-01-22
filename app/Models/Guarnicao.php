<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guarnicao extends Model
{
    use HasFactory;
    protected $fillable = ['prefixo', 'descricao'];
    
    public function servicos() {
		return $this->hasMany('\App\Models\Servico');
	}
}
