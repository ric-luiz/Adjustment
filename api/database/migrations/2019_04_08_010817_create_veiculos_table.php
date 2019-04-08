<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVeiculosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('veiculos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome', 100)->unique()->comment('Nome do automovel, so pode existir um nome para cada automovel');
            $table->string('marca', 100)->comment('Marca daquele automovel: eg: honda, yamaha e etc');
            $table->string('cilindrada', 50)->comment('Cilindrada alcançada por aquele veiculo');
            $table->longText('descricao')->comment('Descrição sobre o automovel');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('veiculos');
    }
}
