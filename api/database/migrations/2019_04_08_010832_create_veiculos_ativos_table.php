<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVeiculosAtivosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('veiculos_ativos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('quilometragem')->comment('Contagem da kilometragem percorrida pelo automovel, assim que o aplicativo é ativado');
            $table->bigInteger('dias')->comment('Contagem em dias desde que o aplicativo foi ativado usando determinado automovel');
            $table->unsignedBigInteger('veiculo_id');
            $table->foreign('veiculo_id')->references('id')->on('veiculos')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('veiculos_ativos');
    }
}
