<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->increments('id');
            //$table->unsignedInteger('plano_id');
            $table->string('name');
            $table->string('email');
            $table->string('telefone');
            $table->string('estado');
            $table->string('cidade');
            $table->string('dtnascimento');
            $table->timestamps();
            //$table->foreign('plano_id')->references('id')->on('planos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clientes');
    }
}
