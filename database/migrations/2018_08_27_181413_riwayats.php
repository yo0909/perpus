<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Riwayats extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('riwayats', function (Blueprint $table) { 
            $table->increments('id'); 
            $table->string('status')->default('Pinjam');
            $table->integer('denda')->nullable(); 
            $table->integer('lamapeminjaman');
            $table->integer('kodebuku_id')->unsigned(); 
            $table->integer('user_id')->unsigned();
            $table->timestamps();

            $table->foreign('kodebuku_id')->references('id')->on('kodebukus') ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users') ->onUpdate('cascade')->onDelete('cascade'); 
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
