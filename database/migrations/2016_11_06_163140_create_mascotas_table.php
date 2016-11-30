<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMascotasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('mascotas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idUsuario')->unsigned();
            $table->index('idUsuario')
            ->references('id')->on('users');
            //->onDelete('cascade');
            $table->string('nombre', 45);
            $table->integer('edad');
            $table->integer('idProvincia')->unsigned();
            $table->index('idProvincia')
            ->references('id')->on('provincias');
            $table->integer('idLocalidad')->unsigned();
            $table->index('idLocalidad')
            ->references('id')->on('localidades');
            $table->integer('idRaza')->unsigned();
            $table->index('idRaza')
            ->references('id')->on('razas');
            $table->integer('idPedigree')->nullable()->unsigned();
            $table->index('idPedigree')
            ->references('id')->on('pedigrees');
            $table->integer('idMuro');
            $table->index('idMuro')
            ->references('id')->on('muros');
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
        Schema::dropIfExists('mascotas');
    }
}
