<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHomesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('homes', function (Blueprint $table) {
        //     $table->increments('id');
        //     $table->string('name')->nullable()->comment('Home name');
        //     $table->text('content')->nullable()->comment('Home content');
        //     $table->tinyInteger('status')->default(1)->comment('0: hide, 1: show');
        //     $table->timestamps();
        //     $table->softDeletes();
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::dropIfExists('homes');
    }
}
