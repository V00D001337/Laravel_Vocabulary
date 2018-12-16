<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePieczywoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pieczywos', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id')->nullable(false);
            $table->string('nazwa', 15)->nullable(false);
            $table->text('skladniki')->nullable(false);
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
        Schema::dropIfExists('pieczywos');
    }
}
