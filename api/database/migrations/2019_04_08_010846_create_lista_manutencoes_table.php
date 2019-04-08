<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateListaManutencoesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lista_manutencoes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome', 100)->comment('Nome da peça que deve ser inspecionada');
            $table->longText('descricao')->comment('Descrição sobre o que deve ser executado com aquela peça');
            $table->bigInteger('quilometragem')->comment('Quantidade de Kilometros para que seja necessário realizar algum ajuste ou mautenção');
            $table->bigInteger('dias')->comment('Quantidade de Dias para que o ajuste ou manutenção da peça seja realizada. 0 quer dizer que apenas por quilometragem');
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
        Schema::dropIfExists('lista_manutencoes');
    }
}
