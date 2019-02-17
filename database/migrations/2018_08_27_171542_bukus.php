<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Bukus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bukus', function (Blueprint $table) { 
            $table->increments('id'); 
            $table->string('judul'); 
            $table->integer('penulis_id')->unsigned(); 
            $table->integer('tahun_terbit'); 
            $table->string('sinopsis'); 
            $table->timestamps();

            $table->foreign('penulis_id')->references('id')->on('penulis') ->onUpdate('cascade')->onDelete('cascade'); 
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
