<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBienfaiteursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bienfaiteurs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('b_name', 999);
           
            $table->string('sex');
            $table->string('region', 999);
            $table->integer('Ntelephone')->nullable();
            $table->string('created_by',90);
            $table->softDeletes();
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
        Schema::dropIfExists('bienfaiteurs');
    }
}
