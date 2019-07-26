<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('codigo')->nullable();
            $table->string('tipo')->nullable();
            $table->string('nombre')->nullable();
            $table->string('propietario')->nullable();
            $table->string('bodega')->nullable();
            $table->string('cantidad')->nullable();
            $table->string('detalle')->nullable();
            $table->text('ficha')->nullable();
            $table->string('fecha_entrada')->nullable();

            $table->integer('cliente_id')->unsigned()->nullable();
            $table->foreign('cliente_id')
                  ->references('id')
                  ->on('clientes')
                  ->onDelete('cascade');

            

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
        Schema::dropIfExists('productos');
    }
}
