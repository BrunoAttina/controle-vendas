<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriarTabelaVendas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Vendas', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('fkCliente');
            $table->foreign('fkCliente')->references('id')->on('clientes');

            $table->integer('fkProduto');
            $table->foreign('fkProduto')->references('id')->on('produtos');

            $table->integer('qtd');
            $table->double('valor', 8, 2);
            $table->string('pagto');
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
        //
    }
}
