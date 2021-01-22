<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use \App\Models\Militar;

class MilitarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Militar::Factory()->count(10)->create();
    }
}
