<?php

namespace Database\Factories;

use App\Models\Cidade;
use Illuminate\Database\Eloquent\Factories\Factory;

class CidadeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Cidade::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $vetorCIA = ['1ª CIA', '2ª CIA', '3ª CIA'];
        $indece = random_int(0, 2);
        $cia = $vetorCIA[$indece];
        return [
            'companhia' => $cia,
            'nome' => $this->faker->city
        ];
    }
}
