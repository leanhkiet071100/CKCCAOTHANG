<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->string('phone_number')->nullable();
            $table->string('password')->nullable();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('sub_name')->nullable();
            $table->date('birth_date')->nullable();
            $table->boolean('sex')->nullable();
            $table->text('avatar')->nullable();
            $table->text('cover_image')->nullable();
            $table->boolean('isAdmin')->nullable()->default(1);
            $table->boolean('isSubAdmin')->nullable();
            // $table->timestamp('email_verified_at')->nullable();          //? Not use  
            // $table->rememberToken();                                        //? Not use 
            $table->timestamps();
            $table->softDeletes();
            $table->string('token')->nullable();
            $table->integer('status')->nullable()->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}