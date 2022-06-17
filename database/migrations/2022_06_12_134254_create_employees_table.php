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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->date('fecha_inicio');
            $table->date('fecha_baja');
            $table->unsignedBigInteger('directory_id');
            $table->foreign('directory_id')->references('id')->on('directories');
            $table->unsignedBigInteger('area_id');
            $table->foreign('area_id')->references('id')->on('headquarters');
            $table->unsignedBigInteger('costcenter_id');
            $table->foreign('costcenter_id')->references('id')->on('sub_costcenters');
            $table->double('salario');
            $table->string('cuenta_deposito');
            $table->string('estado');
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
        Schema::dropIfExists('employees');
    }
};
