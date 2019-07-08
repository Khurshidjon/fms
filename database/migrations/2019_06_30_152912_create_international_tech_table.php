<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInternationalTechTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('international_tech', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('id_category_inter_tech');
            $table->string('weight');
            $table->string('cost');
            $table->string('from_pay_courier');
            $table->integer('type')->nullable()->default(0);
            $table->integer('status')->nullable()->default(1);
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
        Schema::dropIfExists('international_tech');
    }
}
