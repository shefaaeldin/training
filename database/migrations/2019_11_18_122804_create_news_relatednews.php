<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsRelatednews extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news_relatednews', function (Blueprint $table) {
            $table->unsignedBigInteger('news_id')->references('id')->on('news');
            $table->unsignedBigInteger('relatednews_id')->references('id')->on('news');
            $table->increments('id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news_relatednews');
    }
}
