<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRussianCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('russian_cities', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);
            $table->string('subject', 50)->nullable()->comment('Субъект федерации');
            $table->string('district', 50)->nullable()->comment('Район');
            $table->string('coords_lat', 20)->nullable()->comment('широта');
            $table->string('coords_lon', 20)->nullable()->comment('долгота');
            $table->integer('population')->nullable()->comment('Численность населения');
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
        Schema::dropIfExists('russian_cities');
    }
}
