<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableHasPlanoClientes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('has_plano_clientes', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('plano_id');
            $table->unsignedInteger('cliente_id');
            $table->timestamps();
            $table->foreign('plano_id')->references('id')->on('planos');
            $table->foreign('cliente_id')->references('id')->on('clientes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('has_plano_clientes');
    }
}
