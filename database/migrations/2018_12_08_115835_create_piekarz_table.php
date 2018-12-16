<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePiekarzTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('piekarzs', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id')->nullable(false);
            $table->string('imie', 15)->nullable(false);
            $table->string('nazwisko', 20)->nullable(false);
            $table->date('data_zatrudnienia')->nullable(false)->useCurrent();
            $table->integer('specjalnosc')->unsigned()->nullable(false);
            $table->foreign('specjalnosc')->references('id')->on('pieczywos')->onDelete('cascade');
            $table->boolean('ubezpieczenie')->nullable(false);
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
        Schema::dropIfExists('piekarzs');
    }
}
