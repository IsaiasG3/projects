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
        Schema::create('mensajes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_usuarioe');
            $table->foreignId('id_usuarior');
            $table->string('contenido');
            $table->date('fechaenvio');
            $table->timestamps();
            $table->foreign('id_usuarioe')->references('id')
            ->on('users')->onDelete('cascade');
            $table->foreign('id_usuarior')->references('id')
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
        Schema::dropIfExists('mensajes');
    }
};
