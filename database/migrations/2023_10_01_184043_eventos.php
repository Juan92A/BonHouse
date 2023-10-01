<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eventos', function (Blueprint $table) {
            $table->bigIncrements('id_pedido');
            $table->double('total_pagar');
            $table->date('fecha_pedido');
            $table->unsignedBigInteger('id_estado_pedido');
            $table->unsignedBigInteger('id_usuario');
            $table->string('nombre_cliente', 100);
            $table->integer('cantidad_personas');
            $table->date('fecha_evento');
            $table->string('telefono', 10);            
            $table->string('email', 30);

         
        });
        Schema::table('eventos', function (Blueprint $table) {
            $table->foreign('id_estado_pedido')->references('id_estado_pedido')->on('estado_pedidos')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_usuario')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
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
};
