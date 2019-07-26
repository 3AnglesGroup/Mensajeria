<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaquetesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paquetes', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('estado')->nullable();
            $table->string('guia')->nullable();
            $table->string('nombre')->nullable();
            $table->string('telefono')->nullable();
            $table->string('telefono_alternativo')->nullable();
            $table->string('direccion')->nullable();
            $table->string('barrio')->nullable();
            $table->string('producto')->nullable();
            $table->string('cantidad')->nullable();
            $table->string('valor')->nullable();
            $table->string('total')->nullable();
            $table->string('ciudad')->nullable();
            $table->text('observacion')->nullable();
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
        Schema::dropIfExists('paquetes');
    }
}
