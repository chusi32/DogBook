<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMensajesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mensajes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idMuro')->unsigned();
            $table->index('idMuro')
            ->references('id')->on('muros');
            $table->integer('idMascota')->unsigned();
            $table->index('idMascota')
            ->references('id')->on('mascotas');
            $table->string('mensaje', 500)->nullable();
            $table->string('urlVideo',500)->nullable();
            $table->string('urlImagen', 500)->nullable();
            $table->boolean('privado')->default(false);
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
