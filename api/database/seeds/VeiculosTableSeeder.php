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

        /*
         * Recuperando quantos Veiculos deseja-se criar no banco de dados
        */
        $count = (int)$this->command->ask('How many veiculos do you need ?', 2);
        $this->command->info("Creating {$count} veiculos.");

        /*
         * Para Cada um dos veiculos criados
        */
        $veiculo = factory(App\Veiculo::class, $count)->create()->each(function ($veiculo) {
                // $user->posts()->save(factory(App\Post::class)->make());

                /*
                 * Recuperando a quantidade de Lista de Manutenções a serem criadas no banco
                */
                $count = (int)$this->command->ask('Quantas Listagens de Manutenção deseja criar?', 5);
                $this->command->info("Creating {$count} Lista Manutenções.");
                for($i = 0; $i < $count; $i++)
                {
                    $listaManutencao = $veiculo->listaManutencao()->save(factory(App\ListaManutencao::class)->make());
                    $listaManutencao->veiculo_id = $veiculo->id;
                    $this->command->info("Lista Criada {$listaManutencao}");
                    $listaManutencao->save();
                }

                /*
                 * Criando Veiculos Ativos para esse determinado veiculo. Lembrando que os veiculos são
                 * Informações genericas para cada Veiculo-ativo
                 */
                $count = (int)$this->command->ask('Quantos Veiculos Ativos deseja criar?', 2);
                $this->command->info("Creating {$count} Veiculos Ativos.");
                for($i = 0; $i < $count; $i++)
                {
                    $VeiculoAtivo = $veiculo->VeiculoAtivo()->save(factory(App\VeiculoAtivo::class)->make());
                    $VeiculoAtivo->veiculo_id = $veiculo->id;
                    $this->command->info("Veiculo Ativo Criado {$VeiculoAtivo}");
                    $VeiculoAtivo->save();
                }

            });;

        $this->command->info('veiculos Created!');
    }
}
