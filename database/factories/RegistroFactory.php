<?php

namespace Database\Factories;

use App\Models\Registro;
use Illuminate\Database\Eloquent\Factories\Factory;

class RegistroFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Registro::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        static $conte = 1;
        $miliar = $conte;
        $conte = $conte +1;
        $comandante = false;
        $motorista = false;
        if($miliar == 1){
            $comandante = true;
        }

        if($miliar == 2){
            $motorista = true;
        }
        
        return [
            'km' => random_int(50000, 100000),
            'comandante' => $comandante,
            'motorista' => $motorista,
            'viatura_id' => 2,
            'servico_id' => 1,
            'militar_id' => $miliar

        ];
        
    }
}
