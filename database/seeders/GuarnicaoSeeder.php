<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use \App\Models\Guarnicao;

class GuarnicaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Guarnicao::Factory()->count(10)->create();
    }
}
