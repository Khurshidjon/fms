<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contracts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('contract_id');
            $table->string('contract_period')->nullable();
            $table->date('contract_start')->nullable();
            $table->date('contract_expiration')->nullable();
            $table->string('company_name');
            $table->string('address');
            $table->string('director');
            $table->string('bank');
            $table->string('rs');
            $table->string('mfo');
            $table->string('inn');
            $table->string('phone');
            $table->string('oked');
            $table->string('email');
            $table->integer('status');
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
        Schema::dropIfExists('contracts');
    }
}
