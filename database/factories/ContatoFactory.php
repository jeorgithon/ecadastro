<?php

namespace Database\Factories;

use App\Models\Contato;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContatoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Contato::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $id = random_int(0,9);
        //$contato = Contato::find($id);

        return [
            'contato' => $this->faker->phoneNumber,
            'militar_id' => $id
        ];
    }
}
