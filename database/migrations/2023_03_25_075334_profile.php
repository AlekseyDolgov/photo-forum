<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profile', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('statistic_id')->unsigned();
            $table->text('user_photo');
            $table->string('about_me')->nullable();
            $table->date('last_vist')->nullable();
            $table->text('photo_technic')->nullable();
            $table->text('place_residence')->nullable();
            $table->date('date_regiatration');
            $table->string('last_name', 100)->nullable();
            $table->string('patronymic', 100)->nullable();
            $table->foreign('statistic_id')->references('id')->on('statistics');
            $table->foreign('user_id')
                ->references('id')->on('users');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
