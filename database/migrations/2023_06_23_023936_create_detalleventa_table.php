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
        Schema::create('detalleventa', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_venta');
            $table->foreignId('id_producto');
            $table->foreignId('id_ubicacion');
            $table->integer('cantidad');
            $table->integer('total');
            $table->timestamps();
            $table->foreign('id_producto')->references('id')
            ->on('productos')->onDelete('cascade');
            $table->foreign('id_venta')->references('id')
            ->on('ventas')->onDelete('cascade');
            $table->foreign('id_ubicacion')->references('id')
            ->on('ubicacion')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalleventa');
    }
};
