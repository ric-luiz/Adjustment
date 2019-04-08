<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAjustesManutencoesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ajustes_manutencoes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->boolean('revisado');
            $table->unsignedBigInteger('veiculo_ativo_id');
            $table->foreign('veiculo_ativo_id')->references('id')->on('veiculos_ativos')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('ajustes_manutencoes');
    }
}
