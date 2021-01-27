<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cidade extends Model
{
    use HasFactory;
    
    protected $fillable = ['companhia', 'nome'];
    public function servicos() {
		return $this->hasMany('\App\Models\Servico');
	}
}
