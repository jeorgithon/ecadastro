<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Viatura extends Model
{
    protected $fillable= ['placa', 'patrimonio', 'km', 'tipo', 'marca', 'modelo'];
    use HasFactory;
    
    public function registros() {
			return $this->hasMany('\App\Models\Registro');
	}
}
