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
        Schema::create('computos', function (Blueprint $table) {
            $table->id();
            $table->string('serie');
            $table->string('folio');
            $table->string('cargador');
            $table->string('descripcion');
            $table->string('tipo');
            $table->foreignId('id_colaborador');
            $table->timestamps();
 //Se especifica que el id_colaborador es una relación con el id de la tabla colaboradores
            $table->foreign('id_colaborador')->references('id')
                ->on('colaboradores')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('computos');
    }
};
