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
            $table->bigIncrements('id');
            $table->string('nombre')->nullable();
            $table->string('cedula')->nullable();
            $table->string('ciudad')->nullable();
            $table->string('direccion')->nullable();
            $table->string('correo')->nullable();
            $table->string('actividad')->nullable();
            $table->string('representante')->nullable();
            $table->string('tel_representante')->nullable();
            $table->string('correo_representante')->nullable();
            

            $table->integer('user_id')->unsigned()->nullable();
            $table->foreign('user_id')
                  ->references('id')
                  ->on('users')
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
        Schema::dropIfExists('clientes');
    }
}
