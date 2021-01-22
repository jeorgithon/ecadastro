<?php

namespace Database\Factories;

use App\Models\Militar;
use Illuminate\Database\Eloquent\Factories\Factory;

class MilitarFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Militar::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $vetorPostGras = ['SD', 'CB', 'SGT', 'ST', 'TEN', 'CAP', 'MAJ', 'TEN CEL', 'CEL'];
        $indece = random_int(0,8);
        $grad = $vetorPostGras[$indece];
        $matricula = random_int(1000, 2000);
        $mat = strval($matricula);

        $vetorPermissao = ['adim',  'user'];
        $indece = random_int(0,1);
        $permissao =$vetorPermissao[$indece];

        


        return [
            'nomeCompelto' => $this->faker->firstName,
            'nomeGuerra' => $this->faker->lastName,
            'matricula' => $mat,
            'postoGraduacao' => $grad,
            'ome' => "9º BPM",
            'permissao' => $permissao
            
            
        ];
    }
}

