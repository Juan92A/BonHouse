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
        Schema::create('categorias', function (Blueprint $table) {
            $table->id('id_categoria');         
            $table->string('descripcion', 255)->nullable();
            $table->integer('estado');
        });
    }

    public function down()
    {
        Schema::dropIfExists('categorias');
    }
};
