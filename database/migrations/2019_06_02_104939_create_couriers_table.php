<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCouriersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('couriers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('application_id');
            $table->string('from_courier_name');
            $table->string('courier_name');
            $table->string('to_courier_name');
            $table->string('from_courier_phone');
            $table->string('courier_phone');
            $table->string('to_courier_phone');
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
        Schema::dropIfExists('couriers');
    }
}
