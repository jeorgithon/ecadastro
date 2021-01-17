<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registro extends Model
{
    use HasFactory;
    
    public function servico() {
		return $this->belongsTo('\App\Models\Servico');
	}
	
	public function viatura() {
		return $this->belongsTo('\App\Models\Viatura');
	}
	
	public function militar() {
		return $this->belongsTo('\App\Models\Militar');
	}
	
	
}
