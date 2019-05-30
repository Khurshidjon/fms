<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('user_id');
            $table->string('guid');
            $table->unsignedBigInteger('from_city_id');
            $table->unsignedBigInteger('from_district_id')->nullable();
            $table->unsignedBigInteger('to_city_id');
            $table->unsignedBigInteger('to_district_id')->nullable();
            $table->string('from_address')->nullable();
            $table->string('to_address')->nullable();
            $table->string('from_phone')->nullable();
            $table->string('to_phone')->nullable();
            $table->string('from_fio')->nullable();
            $table->string('to_fio')->nullable();
            $table->string('weight')->nullable();
            $table->string('volume')->nullable();
            $table->string('category_pay_service')->nullable();
            $table->string('number_contract')->nullable();
            $table->string('from_date')->nullable();
            $table->string('to_date')->nullable();
            $table->string('delivered_date')->nullable();
            $table->string('category_product')->nullable();
            $table->integer('pieces')->nullable();
            $table->integer('cost_service')->nullable();
            $table->integer('cost_from_courier')->nullable();
            $table->integer('cost_to_courier')->nullable();
            $table->string('from_pay_courier')->nullable();
            $table->string('pay_service')->nullable();
            $table->string('to_pay_courier')->nullable();
            $table->string('category_pay_from_courier')->nullable();
            $table->string('category_pay_to_courier')->nullable();
            $table->string('sale_for_from_courier')->nullable();
            $table->string('sale_for_service')->nullable();
            $table->string('sale_for_to_courier')->nullable();
            $table->string('from_organ_name')->nullable();
            $table->string('to_organ_name')->nullable();
            $table->integer('status')->nullable();

            $table->timestamps();
        });
        Schema::table('applications', function (Blueprint $table){
            $table->foreign('from_city_id')->references('id')->on('regions')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('from_district_id')->references('id')->on('districts')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('to_city_id')->references('id')->on('regions')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('to_district_id')->references('id')->on('districts')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('applications');
    }
}
