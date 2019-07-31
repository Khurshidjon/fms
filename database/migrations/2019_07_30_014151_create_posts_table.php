<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned();
            $table->string('title_uz');
            $table->string('title_ўз');
            $table->string('title_ru');
            $table->string('title_en');
            $table->string('description_uz');
            $table->string('description_ўз');
            $table->string('description_ru');
            $table->string('description_en');
            $table->string('body_uz');
            $table->string('body_ўз');
            $table->string('body_ru');
            $table->string('body_en');
            $table->string('image');
            $table->integer('status');
            $table->integer('banner')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('posts');
    }
}
