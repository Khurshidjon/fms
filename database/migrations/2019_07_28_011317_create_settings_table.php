<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('key');
            $table->string('title_uz')->nullable();
            $table->string('title_ўз')->nullable();
            $table->string('title_ru')->nullable();
            $table->string('title_en')->nullable();
            $table->text('value_uz')->nullable();
            $table->text('value_ўз')->nullable();
            $table->text('value_ru')->nullable();
            $table->text('value_en')->nullable();
            $table->integer('status');
            $table->string('image')->nullable();
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
        Schema::dropIfExists('settings');
    }
}
