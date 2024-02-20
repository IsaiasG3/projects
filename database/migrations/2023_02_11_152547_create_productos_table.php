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
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('descripcion');
            $table->integer('precio');
            $table->string('oferta')->nullable();
            $table->date('creacion');
            $table->string('disponible');
            $table->integer('vendidos');
            $table->string('metodoentrega');
            $table->string('metodopago');
            $table->foreignId('id_usuario');
            $table->timestamps();
            $table->foreign('id_usuario')->references('id')
            ->on('users')->onDelete('cascade');
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
};
