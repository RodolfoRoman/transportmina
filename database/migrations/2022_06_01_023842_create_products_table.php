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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('codigo');
            $table->string('descripcion')->require();
            $table->unsignedBigInteger('measure_id');
            $table->foreign('measure_id')->references('id')->on('measures');
            $table->unsignedBigInteger('family_id');
            $table->foreign('family_id')->references('id')->on('productfamilies');
            $table->double('stock_minimo');
            $table->double('stock_maximo');
            $table->text('descripcion_larga')->nullable();
            $table->string('estado')->require();
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
        Schema::dropIfExists('products');
    }
};
