<?php

use Illuminate\Database\Seeder;

class VeiculosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // factory(App\Veiculo::class, 50)->create()->each(function ($veiculo) {
        //     // $user->posts()->save(factory(App\Post::class)->make());
        // });

        // How many genres you need, defaulting to 10
        $count = (int)$this->command->ask('How many veiculos do you need ?', 10);

        $this->command->info("Creating {$count} veiculos.");

        // Create the Genre
        $veiculo = factory(App\Veiculo::class, $count)->create();

        $this->command->info('veiculos Created!');
    }
}
