<?php

namespace Database\Factories;

use App\Models\Viatura;
use Illuminate\Database\Eloquent\Factories\Factory;

class ViaturaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Viatura::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $vetorMarca = ['Fiat', 'Ford', 'Toyota', 'Volkswagen', 'Chevrolet', 'Honda'];
        $vetorModelo = ['Toro', 'Range', 'Hilux', 'SpaceFox', 'Spin', 'XRE300'];
        $vetorTipo = ['carro', 'carro', 'carro', 'carro', 'carro', 'moto'];
        $km = random_int(50000, 100000);
        $patrimonio = random_int(500, 600);
        $placa = random_int(1000,9000);
        
        $cont = random_int(0,5);
        $tipo = $vetorTipo[$cont];;
        $marca = $vetorMarca[$cont];
        $modelo =$vetorModelo[$cont];
        return [
            'placa' => "PCV".$placa,
            'patrimonio' => "PM".$patrimonio,
            'km' => $km,
            'tipo' => $tipo,
            'marca' => $marca,
            'modelo' => $modelo

        ];
    }
}
