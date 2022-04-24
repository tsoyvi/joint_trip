<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLoginToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            
            $table->enum('role', ['user', 'admin'])->default('user')->after('remember_token');
            $table->json('messengers')->nullable()->after('name');
            $table->string('phone_number', 20)->nullable()->after('name');
            $table->string('city', 20)->nullable()->after('name');
            $table->date('birth_day')->nullable()->after('name');
            $table->string('patronymic', 20)->nullable()->after('name');
            $table->string('surname', 20)->nullable()->after('name');
            $table->string('login')->nullable()->after('id');
            
            // Это поле не требуется каждый пользователь может быть как пассажиром так и водителем
            // $table->enum('user_status', ['Водитель', 'Пассажир'])->default('Пассажир');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('login');
        });
    }
}
