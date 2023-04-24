<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

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
            //$table->bigInteger('statistic_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->string('user_photo', 255)->default('default/user.jpg');
            $table->string('about_me')->nullable();
            $table->date('last_vist')->nullable();
            $table->text('photo_technic')->nullable();
            $table->text('place_residence')->nullable();
            //$table->date('date_regiatration');
            $table->string('last_name', 100)->nullable();
            $table->string('patronymic', 100)->nullable();
            //$table->foreign('statistic_id')->references('id')->on('statistics');
            $table->foreign('user_id')
                ->references('id')->on('users');
        });

        DB::unprepared('
            CREATE TRIGGER add_profile AFTER INSERT ON users
            FOR EACH ROW
            BEGIN
                INSERT INTO profile (user_id) VALUES (NEW.id);
            END;
        ');

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
