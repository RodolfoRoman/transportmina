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
        Schema::create('directories', function (Blueprint $table) {
            $table->id();
            $table->string('nombres');
            $table->string('apellidos');
            $table->string('contribuyente');
            $table->string('email')->nullable();
            $table->string('direccion')->nullable();
            $table->string('nit')->nullable();
            $table->string('dpi')->nullable();
            $table->string('telefono')->nullable();
            //$table->string('tipodir');
            $table->unsignedBigInteger('directorytipes_id');
            $table->foreign('directorytipes_id')->references('id')->on('directorytipes');
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
        Schema::dropIfExists('directories');
    }
};
