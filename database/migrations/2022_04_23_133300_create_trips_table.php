<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTripsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trips', function (Blueprint $table) {
            $table->id();
            $table->foreignId('driver_id')->constrained('users')->cascadeOnDelete();
            $table->string('from', 20)->comment('Адрес отправления');
            $table->timestamp('date_depart')->comment('дата и время отправления');
            $table->string('to', 20)->comment('Адрес прибытия');
            $table->timestamp('date_arrival')->nullable()->comment('Дата и время прибытия');
            $table->integer('count_pass')->comment('Количество мест');
            $table->integer('place_cost')->nullable()->comment('Стоимость одно места в копейках');
            
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
        Schema::dropIfExists('trips');
    }
}
