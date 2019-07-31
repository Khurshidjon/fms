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
            $table->string('title_uz')->nullable();
            $table->string('title_cyrl')->nullable();
            $table->string('title_ru')->nullable();
            $table->string('title_en')->nullable();
            $table->string('description_uz')->nullable();
            $table->string('description_cyrl')->nullable();
            $table->string('description_ru')->nullable();
            $table->string('description_en')->nullable();
            $table->string('body_uz')->nullable();
            $table->string('body_cyrl')->nullable();
            $table->string('body_ru')->nullable();
            $table->string('body_en')->nullable();
            $table->string('image')->nullable();
            $table->integer('status')->nullable()->default(0);
            $table->integer('banner')->nullable();
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
