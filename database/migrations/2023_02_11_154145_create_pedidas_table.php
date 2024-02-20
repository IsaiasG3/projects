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
        Schema::create('pedidas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_user');
            $table->foreignId('id_producto');
            $table->string('estado');
            $table->date('entrega');
            $table->string('escrito')->nullable();
            $table->string('especial')->nullable();
            $table->integer('precio')->nullable();
            $table->string('tamaño');
            $table->string('sabor');
            $table->string('color');
            $table->timestamps();
            $table->foreign('id_user')->references('id')
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
        Schema::dropIfExists('pedidas');
    }
};
