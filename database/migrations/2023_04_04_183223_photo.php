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
        Schema::create('photo', function (Blueprint $table) {
            $table->id();
            $table->text('photo');
            $table->string('name_photo');
            $table->text('shooting_location')->nullable();
            $table->dateTime('data_publication');
            $table->integer('count_comments')->nullable();
            $table->bigInteger('photographer_user_id')->unsigned();
            $table->bigInteger('categories_id')->unsigned();
            $table->bigInteger('comments_id')->unsigned();
            $table->timestamps();
            $table->foreign('categories_id')->references('id')->on('category');
            $table->foreign('comments_id')->references('id')->on('comments');
            $table->foreign('photographer_user_id')->references('id')->on('users');
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
