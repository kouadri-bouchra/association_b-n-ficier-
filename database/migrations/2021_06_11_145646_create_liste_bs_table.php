<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListeBsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('liste_bs', function (Blueprint $table) {
            $table->id();
        
    
            $table->float('quantite');
            $table->unsignedBigInteger('products_id');
            $table->unsignedBigInteger('bienfaiteur_id');

            $table->softDeletes();
            $table->foreign('products_id')->references('id')->on('products');
            $table->foreign('bienfaiteur_id')->references('id')->on('bienfaiteurs');
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
        Schema::dropIfExists('liste_bs');
    }
}
