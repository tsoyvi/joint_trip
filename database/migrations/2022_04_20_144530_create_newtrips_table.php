<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewtripsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('newtrips', function (Blueprint $table) {
            $table->id('id')->autoIncrement();
            $table->timestamps();
            $table->foreignId('driverId')->constrained('users')->cascadeOnDelete();
            $table->string('startingCity');
            $table->string('destination');
            $table->string('date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('newtrips');
    }
}
