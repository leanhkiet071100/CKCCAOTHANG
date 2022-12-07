<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ForeignKeyMedia extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::table('media_file_upload', function (Blueprint $table) {
        //     $table->foreign('id_post')->references('id')->on('posts');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::table('media_file_upload', function (Blueprint $table) {
        //     $table->dropForeign('media_file_upload_id_post_foreign');
        // });
    }
}
