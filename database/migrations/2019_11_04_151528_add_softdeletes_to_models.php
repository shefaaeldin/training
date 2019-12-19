<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSoftdeletesToModels extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            
            $table->softDeletes();
            
        });
        
         Schema::table('profiles', function (Blueprint $table) {
            
            $table->softDeletes();
            
        });
        
         Schema::table('jobs', function (Blueprint $table) {
            
            $table->softDeletes();
            
        });
        
         Schema::table('cities', function (Blueprint $table) {
            
            $table->softDeletes();
            
        });
        
         Schema::table('roles', function (Blueprint $table) {
            
            $table->softDeletes();
            
        });
        
         Schema::table('permissions', function (Blueprint $table) {
            
            $table->softDeletes();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('models', function (Blueprint $table) {
            //
        });
    }
}
