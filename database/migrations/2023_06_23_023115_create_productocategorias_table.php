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
        Schema::create('productocategorias', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_producto');
            $table->foreignId('id_categoria');
            $table->timestamps();
            $table->foreign('id_producto')->references('id')
            ->on('productos')->onDelete('cascade');
            $table->foreign('id_categoria')->references('id')
            ->on('categorias')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productocategorias');
    }
};
