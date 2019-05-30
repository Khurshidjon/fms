<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTexnologsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('texnologs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('from_city_id');
            $table->unsignedInteger('to_city_id');
            $table->unsignedInteger('from_district_id')->nullable();
            $table->unsignedInteger('to_district_id')->nullable();
            $table->string('weight');
            $table->integer('delivery_time');
            $table->integer('with_courier_from_home_price')->nullable();
            $table->integer('with_courier_to_home_price')->nullable();
            $table->string('service_price');
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
        Schema::dropIfExists('texnologs');
    }
}
