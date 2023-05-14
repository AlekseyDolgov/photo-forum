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
        Schema::table('replies', function (Blueprint $table) {
            $table->dropColumn('thread_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('statistics', function (Blueprint $table) {
            $table->id();
            // добавьте остальные колонки здесь
            $table->timestamps();
        });

        Schema::create('favorites', function (Blueprint $table) {
            $table->id();
            // добавьте остальные колонки здесь
            $table->timestamps();
        });

        Schema::table('replies', function (Blueprint $table) {
            $table->unsignedBigInteger('threat_id')->nullable();
            // добавьте остальные колонки здесь
            $table->foreign('threat_id')->references('id')->on('threats')->onDelete('cascade');
        });
    }
};
