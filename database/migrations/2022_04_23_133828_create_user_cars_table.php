<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_cars', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users')->cascadeOnDelete();
            $table->string('brand', 20)->nullable()->comment('Марка Авто');
            $table->string('model', 20)->nullable()->comment('Модель авто');
            $table->string('body_type', 20)->nullable()->comment('Тип кузова авто');
            $table->string('issue_year', 4)->nullable()->comment('Год выпуска'); // Правда не знаю для чего, так для красоты ))
            $table->string('color', 20)->nullable()->comment('Цвет авто'); 
            $table->string('engine_capacity', 20)->nullable()->comment('Объем двигателя'); // Правда не знаю для чего, так для красоты ))
            $table->string('capacity', 20)->nullable()->comment('Вместимость');
            $table->string('state_number')->comment('Гос. номер авто');
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
        Schema::dropIfExists('user_cars');
    }
}
