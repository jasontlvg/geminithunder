<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductoEncuestaResTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productoEncuestaRes', function (Blueprint $table) {
            $table->bigIncrements('id');
            for($i=1; $i<=7; $i++){
                $table->unsignedBigInteger('p'.$i)->nullable();
                $table->foreign('p'.$i)->references('id')->on('respuestas');
            }
            $table->unsignedBigInteger('owner_id');
            $table->foreign('owner_id')->references('id')->on('users')->onDelete('cascade');
            $table->boolean('answered')->default(false);
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
        Schema::dropIfExists('productoEncuestaRes');
    }
}
