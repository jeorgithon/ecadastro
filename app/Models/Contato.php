<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contato extends Model
{
    use HasFactory;
    protected $fillable= ['contato'];

    public static $rules = ['contato'=>'required'];
	
	public static $messages = ['contato'=>'Contato é um campo obrigatório'];
    
    public function militar() {
			return $this->belongsTo('\App\Models\Militar');
	}
}
