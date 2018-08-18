<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaPago extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pago', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idtiempo')->unsigned();
            $table->integer('idparticipante')->unsigned();
            $table->integer('monto');
        
            $table->foreign('idtiempo')->references('id')->on('control')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('idparticipante')->references('id')->on('participante')->onDelete('cascade')->onUpdate('cascade');

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
        Schema::dropIfExists('pago');
    }
}
