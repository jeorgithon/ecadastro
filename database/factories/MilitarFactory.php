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

        $vetorPermissao = ['admin',  'user'];
        $indece = random_int(0,1);
        $permissao =$vetorPermissao[$indece];
        static $iterador = 0;
        
        $iterador = $iterador + 1;
        if($iterador == 1){
            return [
                'nomeCompleto' => "Administrador do Sistema",
                'nomeGuerra' => "Administrador",
                'matricula' => "12345678",
                'postoGraduacao' => "SD",
                'ome' => "9º BPM",
                'permissao' => "admin",
                'email' => "admin@gmail.com",
                'user_id' => 1
            ];

        }

        return [
            'nomeCompleto' => $this->faker->firstName,
            'nomeGuerra' => $this->faker->lastName,
            'matricula' => $mat,
            'postoGraduacao' => $grad,
            'ome' => "9º BPM",
            'permissao' => $permissao,
            'email' => $this->faker->email,  
            
        ];
    }
}

