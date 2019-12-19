<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('news', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('writer_id');
            $table->foreign('writer_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('main_title');
            $table->string('sub-title')->nullable();
            $table->string('content');
            $table->boolean('is_published')->default(0);
            $table->index('writer_id');
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
}
