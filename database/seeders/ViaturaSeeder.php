<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use \App\Models\Viatura;

class ViaturaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Viatura::Factory()->count(10)->create();
    }
}
