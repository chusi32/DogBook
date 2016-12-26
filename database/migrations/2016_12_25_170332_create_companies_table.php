<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre', 45);
            $table->string('textoCorto', 150);
            $table->string('descripcion', 500);
            $table->integer('idProvincia')->unsigned();
            $table->index('idProvincia')
            ->references('id')->on('provincias');
            $table->integer('idLocalidad')->unsigned();
            $table->index('idLocalidad')
            ->references('id')->on('localidades');
            $table->string('direccion', 150);
            $table->integer('telefono');
            $table->string('web', 45);
            $table->integer('idTipoEmpresa')->unsigned();
            $table->index('idTipoEmpresa')
            ->references('id')->on('tiposEmpresas');
            $table->string('rutaImagen', 500);
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
