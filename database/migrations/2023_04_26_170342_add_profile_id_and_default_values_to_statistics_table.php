<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddProfileIdAndDefaultValuesToStatisticsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('statistics', function (Blueprint $table) {
            // Добавляем новый столбец profile_id, если его еще нет
            if (!Schema::hasColumn('statistics', 'profile_id')) {
                $table->bigInteger('profile_id')->unsigned()->after('id');

                // Добавляем внешний ключ на таблицу profile
                $table->foreign('profile_id')
                    ->references('id')
                    ->on('profile');
            }

            // Добавляем значения по умолчанию для всех столбцов
            $table->integer('quantity_photo')->default(0)->change();
            $table->integer('quantity_album')->default(0)->change();
            $table->integer('quantity_comment')->default(0)->change();
            $table->integer('quantity_views')->default(0)->change();
            $table->integer('quantity_likes')->default(0)->change();
            $table->integer('quantity_deaslikes')->default(0)->change();
            $table->integer('quantity_photo_elected')->default(0)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('statistics', function (Blueprint $table) {
            // Удаляем внешний ключ, если он существует
            $table->dropForeign(['profile_id']);

            // Удаляем столбец profile_id, если он существует
            if (Schema::hasColumn('statistics', 'profile_id')) {
                $table->dropColumn('profile_id');
            }

            // Возвращаем столбцы к их оригинальному состоянию
            $table->integer('quantity_photo')->change();
            $table->integer('quantity_album')->change();
            $table->integer('quantity_comment')->change();
            $table->integer('quantity_views')->change();
            $table->integer('quantity_likes')->change();
            $table->integer('quantity_deaslikes')->change();
            $table->integer('quantity_photo_elected')->change();
        });
    }
}
