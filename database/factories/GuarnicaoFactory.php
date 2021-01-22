<?php

namespace Database\Factories;

use App\Models\Guarnicao;
use Illuminate\Database\Eloquent\Factories\Factory;

class GuarnicaoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Guarnicao::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $vetorDescrcao = ['Maria da Pena', 'GATI A', 'GATI B', 'ROCAM 100', 'ROCAM 200', 'GT 01', 'GT 02'];
        $indece = random_int(0,6);
        $descricao = $vetorDescrcao[$indece];
        return [
            'descricao' => $descricao,
            'prefixo' => "GT 91". random_int(0,2).random_int(0,9)
        ];
    }
}
