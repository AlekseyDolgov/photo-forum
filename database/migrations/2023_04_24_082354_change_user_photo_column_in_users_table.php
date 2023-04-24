<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class ChangeUserPhotoColumnInUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('profile', function (Blueprint $table) {
            $table->string('user_photo', 255)->default('default/user.jpg')->change();
        });
    }

    public function down()
    {
        Schema::table('profile', function (Blueprint $table) {
            $table->string('user_photo', 255)->default('')->change();
        });
    }
};
