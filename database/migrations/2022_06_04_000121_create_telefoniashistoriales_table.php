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
        Schema::create('telefoniashistoriales', function (Blueprint $table) {
                       //CAMPOS
                       $table->id();
                       $table->date('fecha_entrega');
                       $table->string('estado');
                       $table->string('fallas');
                       $table->string('fecha_dev');
                       $table->string('foto_sal1');
                       $table->string('foto_sal2');
                       $table->string('foto_sal3');
                       $table->string('foto_sal4');
                       $table->string('foto_dev1');
                       $table->string('foto_dev2');
                       $table->string('foto_dev3');
                       $table->string('foto_dev4');
                       $table->foreignId('id_colaborador');
                       $table->foreignId('id_dispositivo');
                       $table->timestamps();
           //id de la tabla colaboradores
                       $table->foreign('id_colaborador')->references('id')
                       ->on('colaboradores')->onDelete('cascade');
                       $table->foreign('id_dispositivo')->references('id')
                       ->on('telefonias')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('telefoniashistoriales');
    }
};
