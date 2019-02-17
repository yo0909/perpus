<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Kodebukus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kodebukus', function (Blueprint $table) { 
            $table->increments('id'); 
            $table->string('kodebuku'); 
            $table->integer('buku_id')->unsigned(); 
            $table->timestamps();

            $table->foreign('buku_id')->references('id')->on('bukus') ->onUpdate('cascade')->onDelete('cascade'); 
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
