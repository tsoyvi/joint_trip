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
            
            $table->text('image_link')->nullable()->after('name');
            $table->text('about_me')->nullable()->after('name');
            $table->enum('role', ['user', 'admin'])->default('user')->after('remember_token');
            $table->json('messengers')->nullable()->after('name');
            $table->string('phone_number', 20)->nullable()->after('name');
            $table->string('city', 20)->nullable()->after('name');
            $table->date('birth_day')->nullable()->after('name');
            $table->string('patronymic', 20)->nullable()->after('name');
            $table->string('surname', 20)->nullable()->after('name');
            $table->string('login', 20)->nullable()->after('id');
            
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
            $table->dropColumn('image_link');
            $table->dropColumn('about_me');
            $table->dropColumn('login');
            $table->dropColumn('surname');
            $table->dropColumn('patronymic');
            $table->dropColumn('birth_day');
            $table->dropColumn('city');
            $table->dropColumn('phone_number');
            $table->dropColumn('messengers');
            $table->dropColumn('role');
        });
    }
}
