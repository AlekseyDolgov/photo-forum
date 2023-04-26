<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddProfileIdToStatisticsTable extends Migration
{
    public function up()
    {
        // Добавляем поле profile_id в таблицу statistics
        Schema::table('statistics', function (Blueprint $table) {
            $table->unsignedBigInteger('profile_id')->after('id')->nullable();
        });

        // Создаем внешний ключ на столбец id таблицы profile
        Schema::table('statistics', function (Blueprint $table) {
            $table->foreign('profile_id')->references('id')->on('profile')->onDelete('cascade');
        });

        // Создаем триггер на столбец profile_id
        DB::unprepared('
            CREATE TRIGGER create_statistics_row AFTER INSERT ON `profile`
            FOR EACH ROW
            INSERT INTO `statistics` (`profile_id`) VALUES (NEW.id)
        ');
    }

    public function down()
    {
        // Удаляем триггер
        DB::unprepared('DROP TRIGGER IF EXISTS create_statistics_row');

        // Удаляем внешний ключ
        Schema::table('statistics', function (Blueprint $table) {
            $table->dropForeign(['profile_id']);
        });

        // Удаляем поле profile_id
        Schema::table('statistics', function (Blueprint $table) {
            $table->dropColumn('profile_id');
        });
    }
}
