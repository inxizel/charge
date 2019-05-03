<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateThecaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('thecaos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('uid');
            $table->integer('loaithe');
            $table->string('serial');
            $table->string('mathe');
            $table->integer('menhgia');
            $table->integer('thucnhan')->default(0);
            $table->string('shop');
            $table->integer('api');
            $table->integer('return_code');
            $table->integer('status')->default(0)->comment('0: chua gui, 1: thanh cong, 2: that bai');;
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('thecaos');
    }
}
