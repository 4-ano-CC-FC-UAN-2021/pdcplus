<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAmigosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('amigos', function (Blueprint $table) {
            
            $table->unsignedBigInteger('user_id_send');
            $table->unsignedBigInteger('user_id_receive');
            $table->integer('estado');
            $table->timestamps();
            
            $table->foreign('user_id_send')->references('id')->on('users');
            $table->foreign('user_id_receive')->references('id')->on('users');
            $table->primary(['user_id_send','user_id_receive']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('amigos');
    }
}
