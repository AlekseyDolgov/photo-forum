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
        Schema::create('statistics', function (Blueprint $table) {
            $table->id();
            $table->integer('quantity_photo');
            $table->integer('quantity_album');
            $table->integer('quantity_comment');
            $table->integer('quantity_views');
            $table->integer('quantity_likes');
            $table->integer('quantity_deaslikes');
            $table->integer('quantity_photo_elected');
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
