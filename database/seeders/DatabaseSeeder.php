<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            MilitarSeeder::class,
            ContatoSeeder::class,
            ViaturaSeeder::class, 
            GuarnicaoSeeder::class,
            CidadeSeeder::class,
            ServicoSeeder::class,
            RegistroSeeder::class,
            UserSeeder::class
        ]);
    }
}
