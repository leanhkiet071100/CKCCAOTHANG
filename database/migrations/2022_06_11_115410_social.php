<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Social extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('social', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->string('provider_user_id');
            $table->string('provider');
            $table->foreignId('user');
            // $table->timestamp('email_verified_at')->nullable();          //? Not use  
            // $table->rememberToken();                                        //? Not use 
            $table->timestamps();
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
        Schema::dropIfExists('social');
    
    }
}
