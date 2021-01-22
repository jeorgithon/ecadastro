<?php

namespace Database\Factories;

use App\Models\Servico;
use Illuminate\Database\Eloquent\Factories\Factory;

class ServicoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Servico::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'dataInicial' => $this->faker->date,
            'dataFinal' => $this->faker->date,
            'horaInicial' => $this->faker->time,
            'horaFinal' => $this->faker->time,
            'guarnicao_id' => 1,
            'cidade_id' => 2
        ];
    }
}
