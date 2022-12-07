<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ForgeinKey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function ($table) {      
            $table->foreign('id_user')->references('id')->on('users');
        });
        // Schema::table('posts', function ($table) {      
        //     $table->foreign('id_post_parent')->references('id')->on('posts');
        // });
        Schema::table('media_file_upload', function ($table) {      
            $table->foreign('id_post')->references('id')->on('posts');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        
    }
}