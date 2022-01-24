<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContenusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contenuses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->float('quantite');
            $table->unsignedBigInteger('products_id');
            $table->unsignedBigInteger('pa_id');
            $table->foreign('pa_id')->references('id')->on('paniers');
            $table->foreign('products_id')->references('id')->on('products');
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
        Schema::dropIfExists('contenuses');
    }
}
