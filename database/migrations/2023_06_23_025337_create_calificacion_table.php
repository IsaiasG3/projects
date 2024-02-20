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
        Schema::create('calificacion', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_usuario');
            $table->foreignId('id_producto');
            $table->integer('puntuacion');
            $table->timestamps();
            $table->foreign('id_usuario')->references('id')
            ->on('users')->onDelete('cascade');
            $table->foreign('id_producto')->references('id')
            ->on('productos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('calificacion');
    }
};
