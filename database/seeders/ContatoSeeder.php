<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use \App\Models\Contato;

class ContatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Contato::Factory()->count(10)->create();
    }
}
