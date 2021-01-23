<?php

namespace Database\Factories;

use App\Models\Servico;
use DateTime;
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
        
        $inicial = date('Y-m-d H:i:s');
        $incicialMaisUM = mktime(date('H'), date('i'), date('s'), date('m'), date('d')+1, date('Y'));
        $final = date('Y-m-d H:i:s', $incicialMaisUM);
        return [
            'dataHoraInicial' => $inicial,
            'dataHoraFinal' => $final,
            'guarnicao_id' => random_int(1,10),
            'cidade_id' => random_int(1,10)
        ];
    }
}
