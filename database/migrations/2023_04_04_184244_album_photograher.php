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
        Schema::create('album', function (Blueprint $table) {
            $table->id();
            $table->string('album_name', 100)->nullable();
            $table->dateTime('date_create_album');
            $table->string('description')->nullable();
            $table->bigInteger('categories_id')->unsigned();
            $table->bigInteger('photo_id')->unsigned();
            $table->foreign('categories_id')->references('id')->on('category');
            $table->foreign('photo_id')->references('id')->on('photo');
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
